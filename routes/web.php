<?php
use \App\Http\Controllers\Front;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkLogin;

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

Route::get('/',[Front\homeController::class,'index'] );

Route::prefix('shop')->group(function () {

Route::get('/product/{id}',[Front\ShopController::class, 'show']);
Route::post('/product/{id}',[Front\ShopController::class, 'postComment']);

Route::get('/',[Front\ShopController::class, 'index']);

Route::get('/{categoryName}',[Front\ShopController::class, 'category']);

});

Route::prefix('cart')->group(function () {
    Route::get('add/{id}' , [Front\CartController::class,'add' ]);
    Route::get('/',[Front\CartController::class, 'index']);
    Route::get('delete/{rowId}',[Front\CartController::class, 'delete']);
    Route::get('/destroy',[Front\CartController::class, 'destroy']);
    Route::get('/update',[Front\CartController::class,'update']);

});
//Route::prefix('checkout')->group(function () {
//    Route::get('/',[Front\CheckOutController::class,'index']);
//    Route::post('/',[Front\CheckOutController::class,'addOrder']);
//    Route::get('/vnPayCheck',[Front\CheckOutController::class,'vnPayCheck']);
//    Route::get('/result',[Front\CheckOutController::class,'result']);
//});

Route::get('/blog', [Front\BlogController::class, 'show']);

Route::get('/contact',[Front\ContactController::class, 'show']);

Route::get('/faq',[Front\FaqController::class,'show']);

Route::group(['middleware' => checkLogin::class, 'prefix'=>'checkout'],
    function() {
        Route::get('/',[Front\CheckOutController::class,'index']);
        Route::post('/',[Front\CheckOutController::class,'addOrder']);
        Route::get('/vnPayCheck',[Front\CheckOutController::class,'vnPayCheck']);
        Route::get('/result',[Front\CheckOutController::class,'result']);

});
Route::get('/register',[Front\RegisterController::class,'show']);
Route::post('/storeUser',['as'=>'storeUser', 'uses'=>'App\Http\Controllers\Front\RegisterController@store']);
Route::get('/login', ['as' => 'getLogin', 'uses' => 'App\Http\Controllers\Front\LoginController@getLogin']);
Route::post('/login', ['as' => 'postLogin', 'uses' => 'App\Http\Controllers\Front\LoginController@postLogin']);
Route::get('/logout', ['as' => 'getLogout', 'uses' => 'App\Http\Controllers\Front\LoginController@getLogout']);



Route::get('/page',[Front\BlogDetailController::class,'show']);
