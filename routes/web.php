<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Maincontroller;

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




Route::post('/auth/save',[Maincontroller::class,'save'])->name('auth.save');
Route::post('/auth/check',[Maincontroller::class,'check'])->name('auth.check');
Route::get('/auth/logout',[Maincontroller::class,'logout'])->name('auth.logout');


Route::get('/auth/login',[Maincontroller::class,'login'])->name('auth.login');
Route::get('/auth/register',[Maincontroller::class,'register'])->name('auth.register');

Route::group(['middleware'=>['AuthCheck']],function(){
    
    
});

Route::get('/',[Maincontroller::class,'dashboard'])->name('dash.dashboard');;
Route::get('/dashboarda',[Maincontroller::class,'dashboarda'])->name('dash.dashboarda');;
Route::get('/dashboardu',[Maincontroller::class,'dashboardu'])->name('dash.dashboardu');;

Route::get('/ballgowns',[Maincontroller::class,'ballgowns'])->name('dash.ballgowns'); 
Route::get('/ballgownsa',[Maincontroller::class,'ballgownsa'])->name('dash.ballgownsa');
Route::get('/ballgownsu',[Maincontroller::class,'ballgownsu'])->name('dash.ballgownsu');

Route::get('/sheathgowns',[Maincontroller::class,'sheathgowns'])->name('dash.sheathgowns');
Route::get('/sheathgownsa',[Maincontroller::class,'sheathgownsa'])->name('dash.sheathgownsa');
Route::get('/sheathgownsu',[Maincontroller::class,'sheathgownsu'])->name('dash.sheathgownsu');

Route::get('/mermaidgowns',[Maincontroller::class,'mermaidgowns'])->name('dash.mermaidgowns');
Route::get('/mermaidgownsa',[Maincontroller::class,'mermaidgownsa'])->name('dash.mermaidgownsa');
Route::get('/mermaidgownsu',[Maincontroller::class,'mermaidgownsu'])->name('dash.mermaidgownsu');

Route::get('/reviews',[Maincontroller::class,'reviews'])->name('dash.reviews');
Route::get('/reviewsa',[Maincontroller::class,'reviewsa'])->name('dash.reviewsa');
Route::get('/reviewsu',[Maincontroller::class,'reviewsu'])->name('dash.reviewsu');

Route::post('/dash/addreview',[Maincontroller::class,'addreview'])->name('dash.addreview');

Route::get('/orders',[Maincontroller::class,'orders'])->name('dash.orders');

Route::get('/orderreport',[Maincontroller::class,'orderreport'])->name('dash.orderreport');

Route::get('/orderreport1',[Maincontroller::class,'orderreport1'])->name('dash.orderreport1');
Route::get('/orderreport2',[Maincontroller::class,'orderreport2'])->name('dash.orderreport2');
Route::get('/orderreport3',[Maincontroller::class,'orderreport3'])->name('dash.orderreport3');




Route::get('/manage',[Maincontroller::class,'manage'])->name('dash.manage');

Route::post('/dash/store',[Maincontroller::class,'store'])->name('dash.store');



Route::post('/dash/order',[Maincontroller::class,'order'])->name('dash.order');

Route::get('/addproduct',[Maincontroller::class,'addproduct'])->name('dash.addproduct');




Route::get('/dash/{id}/update',[Maincontroller::class,'update'])->name('dash.editproduct');


Route::post('/dash/fupdate',[Maincontroller::class,'fupdate'])->name('dash.fupdate');


Route::get('/dash/{id}/fdelete',[Maincontroller::class,'fdelete'])->name('dash.fdelete');


Route::get('/dash/{id}/remove',[Maincontroller::class,'remove'])->name('dash.remove');


Route::get('/dash/search',[Maincontroller::class,'search'])->name('dash.search');
Route::get('/dash/search1',[Maincontroller::class,'search1'])->name('dash.search1');
Route::get('/dash/search2',[Maincontroller::class,'search2'])->name('dash.search2');


Route::get('/dash/searcha',[Maincontroller::class,'searcha'])->name('dash.searcha');
Route::get('/dash/searcha1',[Maincontroller::class,'searcha1'])->name('dash.searcha1');
Route::get('/dash/searcha2',[Maincontroller::class,'searcha2'])->name('dash.searcha2');


Route::get('/dash/searchu',[Maincontroller::class,'searchu'])->name('dash.searchu');
Route::get('/dash/searchu1',[Maincontroller::class,'searchu1'])->name('dash.searchu1');
Route::get('/dash/searchu2',[Maincontroller::class,'searchu2'])->name('dash.searchu2');


Route::get('/dash/{id}/buynow',[Maincontroller::class,'buynow'])->name('dash.buynow');
Route::get('/dash/{id}/addtocart',[Maincontroller::class,'addtocart'])->name('dash.addtocart');
Route::get('/dash/cart',[Maincontroller::class,'cart'])->name('dash.cart');
Route::get('/dash/carttobuy',[Maincontroller::class,'carttobuy'])->name('dash.carttobuy');


