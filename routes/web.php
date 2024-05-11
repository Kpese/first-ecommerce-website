<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [HomeController::class, 'productpage'])->name('productpage');

Route::get('/Products/{product}', [HomeController::class, 'product_detail'])->name('product_detail');
Route::post('/Products/{product}/add_cart', [HomeController::class, 'add_cart'])->name('add_cart')->middleware('auth');
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart')->middleware('auth');
Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order')->middleware('auth');
Route::delete('/Carts/{cart}', [HomeController::class, 'delete_cart'])->name('cart.delete');


Route::middleware(['admin'])->group(function () {

Route::get('/admins/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admins/order', [AdminController::class, 'order'])->name('order');
Route::get('/Orders/{order}', [AdminController::class, 'delivered'])->name('delivered');
Route::get('/Orders/{order}/pdf', [AdminController::class, 'pdf'])->name('pdf');
Route::get('/Orders/{order}/email', [AdminController::class, 'send_email'])->name('send-email');
Route::get('/Orders/{order}/user-email', [AdminController::class, 'send_user_email'])->name('send_user_email');

Route::get('/admins/category', [AdminController::class, 'category'])->name('category');
Route::post('/admins/category', [AdminController::class, 'add_category'])->name('add_category');
Route::delete('/Categories/{category}', [AdminController::class, 'delete_category'])->name('category.delete');

// Route::get('/admins/search', [AdminController::class, 'search'])->name('search');

Route::get('/admins/products', [AdminController::class, 'store_product'])->name('store_product');
Route::post('/admins/products', [AdminController::class, 'add_product'])->name('add_product');
Route::get('/admins/show-products', [AdminController::class, 'show_product'])->name('show_product');
Route::get('/Products/{product}/edit', [AdminController::class, 'edit_product'])->name('edit_product');
Route::post('/Products/{product}', [AdminController::class, 'update_product'])->name('update_product');
Route::delete('/Products/{product}', [AdminController::class, 'delete_product'])->name('product.delete');

});
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
