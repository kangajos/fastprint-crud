<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductController::class,'index'])->name('product.index');

Route::prefix('product')->group(function(){
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/',[ProductController::class,'store'])->name('product.store');
    Route::get('/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/{product}/delete',[ProductController::class,'destroy'])->name('product.delete');
});
