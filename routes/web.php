<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\CalController;
use App\Http\Controllers\CashierContoller;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NotBookController;
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
    Route::post('/search/product/code/report', 'searchProductCodeReport')->name('search.product.code.report');
    Route::post('/new/products', 'newProducts')->name('new.products');
    Route::post('/new/news', 'newNews')->name('new.news');
    Route::post('/u_new/products', 'uNewProducts')->name('u_new.products');
    Route::post('/search/product', 'search_product')->name('search.product');
    Route::post('/search/price', 'searchPrice')->name('search.price');
    Route::post('/save/product', 'saveProduct')->name('save.product');
    Route::get('/save/factor', 'saveFactor')->name('save.factor');
    Route::post('/edit/number', 'editNumber')->name('edit.number');
    Route::post('/edit/total/number', 'editTotalNumber')->name('edit.total.number');
    Route::get('/edit/product/{name}', 'edit_product')->name('edit.product');
    Route::post('/edit/product/{name}', 'edit_product_p')->name('edit.product.p');
    Route::get('/delete/product/{id}', 'delete_product')->name('delete.product');
    Route::post('/delete/products', 'delete_products')->name('delete.products');
    Route::post('/delete/news', 'delete_news')->name('delete.news');
    Route::get('/report' , 'report')->name('report');
    Route::post('/report/products' , 'reprotProducts')->name('reprot.products');
    Route::post('/receipt/new' , 'receipt_new')->name('receipt.new');
    Route::get('/creditor' , 'creditor')->name('creditor');
    Route::post('/creditor/search/name' , 'creditor_search')->name('creditor.search');
    Route::post('/creditor/edit/{id}' , 'creditor_edit_post')->name('creditor.edit.post');
    Route::get('/creditor/edit/{data}' , 'creditor_edit')->name('creditor.edit');
    Route::post('/receipt/search/name' , 'receipt_search')->name('receipt.search');
    Route::get('/receipt/edit/{data}' , 'receipt_edit')->name('receipt.edit');
    Route::post('/receipt/edit/{id}' , 'receipt_edit_post')->name('receipt.edit.post');
    Route::post('/creditor/delete/{model}' , 'creditor_delete')->name('creditor.delete');
    Route::post('/creditor/new' , 'creditor_new')->name('creditor.new');
    Route::post('/export/excel', 'exportExcel')->name('export.excel');
    Route::post('/export/download', 'exportDownload')->name('export.download');
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
    Route::post('/report', 'reportAcco')->name('report.acco');
    Route::post('/export/excel', 'exportExcel')->name('export.excel');
    Route::post('/export/download', 'exportDownload')->name('export.download');
});

Route::controller(StoreController::class)->prefix('store')->as('store.')->middleware('lock_store')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/store/edit/product/{data}', 'edit_product')->name('edit.product');
    Route::post('/store/edit/product/{id}', 'edit_product_post')->name('edit.product.post');
    Route::post('/store/delete', 'delete_store')->name('delete.store');
    Route::post('/exit/delete', 'delete_exit')->name('delete.exit');
    Route::post('/store/new', 'new_store')->name('new.store');
    Route::post('/exit/new', 'new_exit')->name('new.exit');
    Route::get('/lock', 'lock_page')->name('lock.page');
    Route::post('/report', 'report')->name('report');
    Route::post('/exit/report', 'exitReport')->name('exit.report');

    Route::post('/export/excel', 'exportExcel')->name('export.excel');
    Route::post('/export/download', 'exportDownload')->name('export.download');

    Route::post('/exit/export/excel', 'exitexportExcel')->name('exit.export.excel');
    Route::post('/exit/export/download', 'exitExportDownload')->name('exit.export.download');
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
Route::post('check/store/lock' , [StoreController::class , 'check_store_lock'])->name('check.store.lock');

Route::controller(NotBookController::class)->prefix('notbook')->as('notbook.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::post('/delete', 'deleteBooks')->name('delete');
    Route::post('/delete/menu', 'deleteMenuBooks')->name('delete.menu');
    Route::post('/new/menu', 'newMenuBooks')->name('new.menu');
    Route::post('/new/book', 'newBook')->name('new.book');

});

Route::controller(CalController::class)->prefix('calendar')->as('calendar.')->group(function () {

    Route::get('/', 'index')->name('index');

});
