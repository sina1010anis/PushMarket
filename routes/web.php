<?php

use App\Http\Controllers\CashierContoller;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class , 'index'])->name('index.page');
Route::controller(CashierContoller::class)->prefix('cashier')->as('cashier.')->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/products', 'products')->name('products');

    Route::post('/new/products', 'new_products')->name('new.products');
    Route::post('/u_new/products', 'u_new_products')->name('u_new.products');

    Route::post('/search/product', 'search_product')->name('search.product');

    Route::post('/save/product', 'save_product')->name('save.product');
    Route::get('/save/factor', 'save_factor')->name('save.factor');

    Route::post('/edit/number', 'edit_number')->name('edit.number');
    Route::get('/edit/product/{name}', 'edit_product')->name('edit.product');
    Route::post('/edit/product/{name}', 'edit_product_p')->name('edit.product.p');

    Route::get('/delete/product/{id}', 'delete_product')->name('delete.product');
    Route::post('/delete/products', 'delete_products')->name('delete.products');

    Route::get('/report' , 'report')->name('report');
    Route::post('/report/products' , 'reprot_products')->name('reprot.products');

    Route::get('/creditor' , 'creditor')->name('creditor');
    Route::post('/creditor/search/name' , 'creditor_search')->name('creditor.search');
    Route::post('/receipt/search/name' , 'receipt_search')->name('receipt.search');
});
