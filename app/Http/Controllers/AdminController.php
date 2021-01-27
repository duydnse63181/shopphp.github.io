<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductGirl;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{

     /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function admin(){
        return view('admin/home_admin');

    }

    public function addadmin(){
        return view('admin/add_admin');

    }

    


    public function delete($id){
        $item_id = Product::find($id);
        $item_id->delete();
        return redirect('home_admin');


    }

    public function update($id){
        $item_by_id = Product::find($id);
        return view('admin/update_admin',["item"=>$item_by_id]);
        

        
    }



    public function indexProduct(){
        $list_product = Product::all();
        return view('admin/home_admin',["list_product"=>$list_product]);
    }

    public function indexUser(){
        $list_user = User::all();
        return view ('admin/user_admin',["list_user"=>$list_user]);
    }
    

    public function deleteUser($id){
        $user_id = User::find($id);
        $user_id->delete();
        return redirect('user');
    }

    public function updateUser($id){
        $user_by_id = User::find($id);
        return view('admin/user_update_admin',["user"=>$user_by_id]);   
    }

    public function updateHandleUser(Request $request){
        $user_id = $request->ID;
        $user_name = $request->Name;
        $user_email = $request->Email;
        $user_pass = $request->Password;
        $user_level = $request->Level;
        
        $user_up = User::find($user_id);
        $user_up->name = $user_name;
        $user_up->email = $user_email;
        $user_up->password = bcrypt($user_pass);
        $user_up->level = $user_level;
        $user_up->save();
        
        return redirect('user');

    }

    

    public function add(Request $request){
        $pro_name = $request->Name;
        $pro_img = $request->Image;
        $pro_img1 = $request->Image1;
        $pro_img2 = $request->Image2;
        $pro_img3 = $request->Image3;
        $pro_img4 = $request->Image4;
        $pro_img5 = $request->Image5;
        $pro_link = $request->Catogoris_id;
        $pro_content = $request->Description;
        $pro_price = $request->Price;
        $pro_hot = $request->Is_hot;
        $pro_is_new = $request->Is_new;

        $pro_new = new Product;
        $pro_new->id ;
        $pro_new->name = $pro_name;
        $pro_new->photo = $pro_img;
        $pro_new->photo1 = $pro_img1;
        $pro_new->photo2 = $pro_img2;
        $pro_new->photo3 = $pro_img3;
        $pro_new->photo4 = $pro_img4;
        $pro_new->photo5 = $pro_img5;
        $pro_new->catogoris_id = $pro_link;
        $pro_new->description = $pro_content;
        $pro_new->price = $pro_price;
        $pro_new->is_hot = $pro_hot;
        $pro_new->is_new = $pro_is_new;
        $pro_new->save();
        
        return redirect('home_admin');

    }

    public function updatehandle(Request $request){
        $pro_id = $request->ID;
        $pro_name = $request->Name;
        $pro_img = $request->Image;
        $pro_img1 = $request->Image1;
        $pro_img2 = $request->Image2;
        $pro_img3 = $request->Image3;
        $pro_img4 = $request->Image4;
        $pro_img5 = $request->Image5;
        $pro_link = $request->Catogoris_id;
        $pro_content = $request->Description;
        $pro_price = $request->Price;
        $pro_hot = $request->Is_hot;
        $pro_is_new = $request->Is_new;

        

        $pro_new = Product::find($pro_id);
        $pro_new->name = $pro_name;
        $pro_new->photo = $pro_img;
        $pro_new->photo1 = $pro_img1;
        $pro_new->photo5 = $pro_img2;
        $pro_new->photo5 = $pro_img3;
        $pro_new->photo4 = $pro_img4;
        $pro_new->photo5 = $pro_img5;
        $pro_new->catogoris_id = $pro_link;
        $pro_new->description = $pro_content;
        $pro_new->price = $pro_price;
        $pro_new->is_hot = $pro_hot;
        $pro_new->is_new = $pro_is_new;
        $pro_new->save();
        
        return redirect('home_admin');

    }

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function addBlog(Request $request){
        $blog_des = $request->Description;
        $blog_title = $request->Title;
        $blog_img = $request->Image;
        $blog_content = $request->Content;

        $blog_new = new Blog;
        $blog_new->id;
        $blog_new->description = $blog_des;
        $blog_new->title = $blog_title;
        $blog_new->img = $blog_img;
        $blog_new->content = $blog_content;


        $blog_new->save();
        
        return redirect('home_admin');
    }

    public function addBlogView(){
        return view('admin/add_blog');

    }

    public function indexBlog(){
        $list_json = Blog::all();
        return view('admin/showBlog',["list_json"=>$list_json]);
    }
}
