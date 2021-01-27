@extends('layouts.app')


@section('content')       
<section id="cart_items">
    
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/home')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            @if(count($cart))
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td class="total">Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    
                    <tr>
                        <td class="cart_product">
                            
                            <a href="#"><img src="{{URL::asset($item->photo)}}" alt="" style="width:20%"></a>
                            
                        </td>
                        <td class="cart_description">
                            <h5><a href="">{{ $item->name }}</a></h5>
                            <p>Web ID: {{ $item->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($item->price)}} VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                
                                <form method="POST" action="{{url("cart?product_id=$item->id&increment=1")}}">
                                     <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="cart_quantity_up">
                                         +
                                    </button>
                                </form>

                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="on" size="1">

                                <form method="POST" action="{{url("cart?product_id=$item->id&decrease=1")}}">
                                     <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="cart_quantity_up">
                                         -
                                    </button>
                                </form>

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($item->subtotal)}} VNĐ  </p>
                        </td>
                        <td>
                        <form method="POST" action="{{url("cart?product_id=$item->id&delete=1")}}">
                                     <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="cart_quantity_up">
                                         X
                                    </button>
                                </form>
                        </td>
                        
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;
                            <span>
                                <a class="btn btn-default update" href="{{ url('/home')}}">Quay về trang chủ</a>
                            </span>

                        </td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tbody>
                                        <tr>
                                            <td>Tổng:</td><td><span>{{ Cart::subtotal() }} VNĐ</span></td>  
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                            <form method="POST" action="{{ url('/checkout')}}">
                                     <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-default check_out">
                                    Gửi đơn hàng
                                    </button>
                                </form>
                                                
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                    </tr>
                    @else
                <p>You have no items in the shopping cart</p>
                @endif
                </tbody>
            </table>
        </div>
     </div>   
</section> <!--/#cart_items-->

@endsection