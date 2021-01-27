<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\AdminBillController;
use App\Http\Controllers\NewsLetterController;
use App\Models\Product;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','DemoControler@showbanner');

Route::get('/home','DemoControler@showbanner');

Route::get('/info_product/{id}',[DemoControler::class, 'showProduct'])->name('website.show_product');

Route::get('/home_admin',  [AdminController::class, 'indexProduct'] )->name('homead');

Route::get('/add_admin',  [AdminController::class, 'addadmin'] )->name('admin.add_inpux');

Route::get('/home_admin/delete/{id}',[AdminController::class, 'delete'])->name('admin.website_delete');

Route::get('/update_admin/{id}',[AdminController::class, 'update'])->name('admin.website_update');

Route::any('/add_admin/add',  [AdminController::class, 'add'] )->name('admin.website_add');

Route::any('/update_admin_hand',[AdminController::class, 'updatehandle'])->name('admin.website_updatehandle');

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);

Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
 
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);

Route::get('register', 'Auth\RegisterController@getRegister');

Route::post('register', 'Auth\RegisterController@postRegister');

Route::any('/cart', 'CartController@cart');

Route::post('/cart/add','CartController@addCart');

Route::get('/checkout', 'CartController@getCheckOut');

Route::post('/checkout', 'CartController@postCheckOut');

Route::get('/product_page/{id}','DemoControler@showProductPage')->name('website.show_page');

Route::resource('bill', 'AdminBillController');

Route::get('/user',  [AdminController::class, 'indexUser'] );

Route::get('/update_user/{id}',[AdminController::class, 'updateUser'])->name('admin.user_update');

Route::get('/user/delete/{id}',[AdminController::class, 'deleteUser'])->name('admin.user_delete');

Route::any('/update_user_hand',[AdminController::class, 'updateHandleUser'])->name('admin.user_updatehandle');

Route::get ( '/searchName', function () {
    return view ( 'searchName' );
} );

Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $product = Product::where ( 'name', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $product ) > 0)
        return view ( 'searchName' )->withDetails ( $product )->withQuery ( $q );
    else
        return view ( 'searchName' )->withMessage ( 'No Details found. Try to search again !' );
} );

Route::get('/add_blog',  [AdminController::class, 'addBlogView'] )->name('blog.admin_add');

Route::any('/add_admin/addblog',  [AdminController::class, 'addBlog'] )->name('blog.admin_addhandle');

Route::get('/blog_admin',  [AdminController::class, 'indexBlog'] )->name('blog.admin_show');

Route::get('/blog', [DemoControler::class, 'indexBlogView']);

Route::get('/blog_details/{id}',[DemoControler::class, 'showBlog'])->name('website.show_blog');

Route::get('/blog_admin/delete/{id}',[AdminController::class, 'deleteBlog'])->name('blog.admin_delete');

Route::get('newsletter',[
    'uses'=>'NewsLetterController@create',
    'as'=>'newsletter'
]);
Route::post('apply',[
    'uses'=>'NewsLetterController@store',
    'as'=>'apply'
]);

Route::post('apply-two',[
    'uses'=>'NewsLetterController@autoMail',
    'as'=>'apply-two'
]);