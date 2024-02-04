<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;

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

Route::get('/', [Productcontroller::class ,'index'])->name('products.index');
Route::get('products/create', [Productcontroller::class ,'create'])->name('products.create');
Route::post('products/store', [Productcontroller::class ,'store'])->name('products.store');
Route::get('products/edit/{id}', [Productcontroller::class ,'edit'])->name('products.edit');
Route::put('products/update/{id}', [Productcontroller::class ,'update'])->name('products.update');
//Route::get('products/delete/{id}', [Productcontroller::class,'destroy'])->name('products.delete');
Route::delete('products/delete/{id}', [Productcontroller::class,'destroy'])->name('products.delete');
Route::get('products/view/{id}', [Productcontroller::class ,'view'])->name('products.view');
