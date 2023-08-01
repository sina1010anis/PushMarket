<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CashierContoller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SetingController;
use App\Http\Controllers\StoreController;
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


Route::controller(CashierContoller::class)->prefix('cashier')->middleware('lock_cashire')->as('cashier.')->group(function(){
    Route::get('/', 'index')->name('index');


    Route::get('/products', 'products')->name('products');

    Route::post('/new/products', 'new_products')->name('new.products');
    Route::post('/new/news', 'new_news')->name('new.news');
    Route::post('/u_new/products', 'u_new_products')->name('u_new.products');

    Route::post('/search/product', 'search_product')->name('search.product');
    Route::post('/search/price', 'search_price')->name('search.price');

    Route::post('/save/product', 'save_product')->name('save.product');
    Route::get('/save/factor', 'save_factor')->name('save.factor');

    Route::post('/edit/number', 'edit_number')->name('edit.number');
    Route::post('/edit/total/number', 'edit_total_number')->name('edit.total.number');
    Route::get('/edit/product/{name}', 'edit_product')->name('edit.product');
    Route::post('/edit/product/{name}', 'edit_product_p')->name('edit.product.p');

    Route::get('/delete/product/{id}', 'delete_product')->name('delete.product');
    Route::post('/delete/products', 'delete_products')->name('delete.products');
    Route::post('/delete/news', 'delete_news')->name('delete.news');

    Route::get('/report' , 'report')->name('report');
    Route::post('/report/products' , 'reprot_products')->name('reprot.products');

    Route::get('/creditor' , 'creditor')->name('creditor');
    Route::post('/creditor/search/name' , 'creditor_search')->name('creditor.search');
    Route::post('/creditor/edit/{id}' , 'creditor_edit_post')->name('creditor.edit.post');
    Route::get('/creditor/edit/{data}' , 'creditor_edit')->name('creditor.edit');
    Route::post('/receipt/search/name' , 'receipt_search')->name('receipt.search');
    Route::get('/receipt/edit/{data}' , 'receipt_edit')->name('receipt.edit');
    Route::post('/receipt/edit/{id}' , 'receipt_edit_post')->name('receipt.edit.post');
    Route::post('/creditor/delete/{model}' , 'creditor_delete')->name('creditor.delete');
    Route::post('/creditor/new' , 'creditor_new')->name('creditor.new');
    Route::post('/receipt/new' , 'receipt_new')->name('receipt.new');
});
Route::controller(AccountingController::class)->prefix('acco')->as('acco.')->middleware('lock_acco')->group(function(){
    Route::get('/', 'index')->name('index');

    Route::post('/new/account', 'new_acco')->name('new.acco');
    Route::post('/new/cash', 'new_cash')->name('new.cash');
    Route::post('/new/bank', 'new_bank')->name('new.bank');

    Route::post('/edit/status/cash' , 'edit_stauts_cash')->name('edit.cash');

    Route::get('/account/edit/{DataAcco}', 'edit_acco')->name('edit.acco');
    Route::post('/account/edit/{id}', 'edit_acco_post')->name('edit.acco.post');

    Route::get('/report', 'report')->name('report');
    Route::post('/report/acco', 'report_acco')->name('report.acco');
});
Route::controller(StoreController::class)->prefix('store')->as('store.')->group(function(){
    Route::get('/', 'index')->name('index');

    Route::get('/store/edit/product/{data}', 'edit_product')->name('edit.product');
    Route::post('/store/edit/product/{id}', 'edit_product_post')->name('edit.product.post');

    Route::post('/store/delete', 'delete_store')->name('delete.store');

    Route::post('/store/new', 'new_store')->name('new.store');
});


Route::controller(SetingController::class)->prefix('setting')->as('seting.')->group(function(){
    Route::get('/cashire' , 'index')->name('index');

    Route::get('/store' , 'store')->name('store');

    Route::get('/account' , 'acco')->name('acco');

    Route::get('/admin' , 'admin')->name('admin');

    Route::get('/lock' , 'lock')->name('lock');

    Route::get('/about' , 'about')->name('about');

    Route::post('/edit/setting' , 'edit_setting')->name('edit.setting');
    Route::post('/edit/acco' , 'edit_acco')->name('edit.acco');
    Route::post('/edit_unit' , 'edit_unit')->name('edit_unit');
    Route::post('/edit/lock/{type}' , 'edit_lock')->name('edit.lock');

    Route::post('/delete' , 'delete')->name('delete');

    Route::post('/new/acco' , 'new_acco')->name('new.acco');
    Route::post('/new/cashire' , 'new_cashire')->name('new.cashire');

    Route::post('/delete/cashire/{id}' , 'delete_cashire')->name('delete.cashire');

    Route::post('/check/cashire' , 'check_cashire')->name('check.cashire');

    Route::get('/exit/cashire' , 'exit_cashire')->name('exit.cashire');
});

Route::get('/cashire/lock' , [CashierContoller::class , 'lock'])->name('cashier.lock');
Route::post('check/cashire/lock' , [CashierContoller::class , 'check_cashire_lock'])->name('check.cashire.lock');

Route::get('/acco/lock' , [AccountingController::class , 'lock'])->name('acco.lock');
Route::post('/check/acco/lock' , [AccountingController::class , 'check_acco_lock'])->name('check.acco.lock');
