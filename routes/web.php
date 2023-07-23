<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [App\Http\Controllers\frontpage\InterfaceController::class, 'index']);
Route::get('/kumpulan', [App\Http\Controllers\frontpage\InterfaceController::class, 'kumpulan']);
Route::get('/kumpulan/{slug}', [App\Http\Controllers\frontpage\InterfaceController::class, 'produk']);
Route::get('/kumpulan/{slug}/{brand}', [App\Http\Controllers\frontpage\InterfaceController::class, 'view_detail']);
Route::get('/profile', [App\Http\Controllers\frontpage\ProfileController::class, 'profile']);

Route::get('/search',[App\Http\Controllers\frontpage\InterfaceController::class, 'search']);
Route::post('/searchitem',[App\Http\Controllers\frontpage\InterfaceController::class, 'searchitem']);
Auth::routes();



// /Route::get('/home', [App\Http\Controllers\::class, 'index'])->name('home');

Route::post('/add-cart', [App\Http\Controllers\frontpage\CartController::class,'additem']);
Route::post('/delete-cart-item', [App\Http\Controllers\frontpage\CartController::class,'deleteitem']);
Route::post('/update-item', [App\Http\Controllers\frontpage\CartController::class,'updateitem']);


Route::middleware(['auth'])->group(function ()
{
    Route::get('/cart',[App\Http\Controllers\frontpage\CartController::class,'viewitem']);
    Route::get('/checkout',[App\Http\Controllers\frontpage\CheckoutController::class,'index']);
    Route::post('/pay-order',[App\Http\Controllers\frontpage\CheckoutController::class,'order']);
    Route::get('/receipt',[App\Http\Controllers\frontpage\UserController::class,'index']);
    Route::get('/receipt-item/{id}',[App\Http\Controllers\frontpage\UserController::class,'view']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index'); });

        Route::controller(App\Http\Controllers\admin\ProductController::class)->group(function () {
            Route::get('/product', 'index');
            Route::get('/add-product', 'add');
            Route::post('/product', 'store');
            Route::get('/edit-prod/{id}', 'edit');
            Route::put('/update-prod/{id}', 'update');
            Route::get('/delete-prod/{id}', 'execute');
        });

        Route::controller(App\Http\Controllers\admin\CategoryController::class)->group(function () {
            Route::get('/categories', 'index');
            Route::get('/add-categories', 'add');
            Route::post('/categories', 'store');
            Route::get('/edit-category/{id}', 'edit');
            Route::put('update-category/{id}', 'update');
            Route::get('/delete-category/{id}', 'execute');
        });

        Route::controller(App\Http\Controllers\admin\SliderController::class)->group(function () {
            Route::get('slider','index');
            Route::get('add-slider','add');
            Route::post('slider','store');
            Route::get('/edit-slid/{id}','edit');
            Route::put('/update-slid/{id}','update');
            Route::get('/delete-slid/{id}', 'execute');
        });

        Route::controller(App\Http\Controllers\admin\PanelController::class)->group(function () {
            Route::get('/panel','index');
            Route::get('/view-user/{id}','view');
        });


});
