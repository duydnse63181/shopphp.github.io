<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Bill_detail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Cart;
class CartController extends Controller
{
        

        
    public function addCart(){
        
        if (Request::isMethod('post')) {
        $this->data['title'] = 'Giỏ hàng của bạn';
        $product_id = Request::get('product_id');
        $product = Product::find($product_id);
        
            $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'photo' => $product->photo,
                'qty' => '1'
            ];
            
            Cart::add($cartInfo);
            
        }

        // $cart = Cart::content();
        // $this->data['cart'] = $cart;



        return  redirect()->back();
    }
        
    

    public function cart()
    {
        

        // if (Request::isMethod('post')) {
        //     $this->data['title'] = 'Giỏ hàng của bạn';
        //     $product_id = Request::get('product_id');
        //     $product = Product::find($product_id);
            
        //         $cartInfo = [
        //             'id' => $product_id,
        //             'name' => $product->name,
        //             'price' => $product->price,
        //             'photo' => $product->photo,
        //             'qty' => '1'
        //         ];
                
        //         Cart::add($cartInfo);
                
        //     }

    
            
        
        $cart = Cart::content();
        $this->data['cart'] = $cart;
         //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        if (Request::get('product_id') && (Request::get('delete')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::remove($item->rowId);
        }

        Cart::priceTotal();

        $cart = Cart::content();
        $this->data['cart'] = $cart;



        return view('cartpage',$this->data);
       
    }


    public function getCheckOut() {
        $this->data['title'] = 'Check out';
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('checkout', $this->data);
    }

    public function postCheckOut(Request $request) {
        $cartInfor = Cart::content();
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|digits_between:10,12'

        ];
        
        $validator = Validator::make(Input::all(), $rule);
        
        if ($validator->fails()) {
            return redirect('/checkout')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            // save
            $customer = new Customer;
            $customer->name = Request::get('fullName');
            $customer->email = Request::get('email');
            $customer->address = Request::get('address');
            $customer->phone_number = Request::get('phoneNumber');
            //$customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = str_replace(',', '', Cart::total());
            $bill->note = Request::get('note');
            $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new Bill_detail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();

           return redirect('home');
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    


}