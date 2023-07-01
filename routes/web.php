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
    Route::post('/save/product', 'save_product')->name('save.product');
    Route::get('/save/factor', 'save_factor')->name('save.factor');
});
