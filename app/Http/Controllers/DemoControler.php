<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProductGirl;
use App\Models\ProductBoy;
use App\Models\ProductMen;
use App\Models\Product;
use App\Models\Product_categoris;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DemoControler extends Controller{
    
     /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

   

    public function showNewProduct(){
        $listpro = Product::all();
        return view('home',['listpro'=>$listpro]);
    }


    
    
    

    
    public function showbanner()
    {
        $banners = DB::select('select * from banner');
        $listpro = Product::all();
        $listprogirl = ProductGirl::all();
        $listproboy = ProductBoy::all();
        $listpromen = ProductMen::all();
        return view('home',['listbanner'=>$banners,'listprogirl'=>$listprogirl,'listproboy'=>$listproboy,'listpromen'=>$listpromen,'listpro'=>$listpro]);
    }

    public function showProduct($id){
        $item_by_id = Product::find($id);
        $listpro = Product::all();
        return view('info_product',["item"=>$item_by_id,'listpro'=>$listpro]);
        

        
    }

    public function showProductPage($catogoris_id){
        $item_by_id = Product::find($catogoris_id);
        $listpro = Product::all();
        return view('product_page',["item"=>$item_by_id,'listpro'=>$listpro]);
        

        
    }

    public function showSlick(){
        $listprogirl = ProductGirl::all();
        return view('slick',['listprogirl'=>$listprogirl]);
        

        
    }




    public function indexSearch()
    {
        return view('searchName');
    }


    public function indexBlogView(){
        $list_json = Blog::all();
        return view('blogg' ,["list_json"=>$list_json]);
    }

    public function showBlog($id){
        $blog_by_id = Blog::find($id);
        $list_comment = Comment::all();
        $list_user = User::all();
        return view('blog_detail',["blog"=>$blog_by_id,"list_comment"=>$list_comment,"list_user"=>$list_user]);

        
    }


    public function addComment(Request $request){
        $commnet_content = $request->Description;
        $comment_ui = $request->User_id;
        $commnet_bi = $request->Blog_id;

        $comment_new = new Comment;
        $comment_new->id;
        $comment_new->content = $commnet_content;
        $comment_new->user_id = $comment_ui;
        $comment_new->blog_id = $commnet_bi;


        $comment_new->save();

        return  redirect()->back();

    }
        
       
}