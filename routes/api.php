<?php

use App\Http\Controllers\{
    SupplierController,
    ProductController
};
use Illuminate\Support\Facades\Route;



Route::get('product', [ProductController::class, 'get']);
Route::post('product', [ProductController::class, 'create']);
Route::put('product/{product}', [ProductController::class, 'update']);
Route::delete('product/{product}', [ProductController::class, 'delete']);



Route::get('supplier/', [SupplierController::class, 'get']);
Route::get('supplier/{supplier}', [SupplierController::class, 'getCurrentUser']);
Route::post('supplier/', [SupplierController::class, 'create']);
Route::post('supplier/detach-product', [SupplierController::class, 'detachProduct']);
Route::put('supplier/{supplier}', [SupplierController::class, 'update']);
Route::delete('supplier/{supplier}', [SupplierController::class, 'delete']);
