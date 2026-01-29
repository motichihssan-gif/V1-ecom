<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProduitController;

Route::apiResource('products', ProduitController::class);
Route::get('products/filter/{q}', [ProduitController::class, 'filter']);
