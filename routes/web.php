<?php
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () { 
return view('Home'); 
});
Route::get('/about', function () {
    return view('About');
});

Route::get('/contact', function () {
    return view('Contact');
});

Route::get('/products', function () {
    $products = Product::paginate(6);
    
    return view('Produits', ['products' => $products, 'categorie' => 'Tous']);
});



Route::get('/produits/{cat}', [ProductController::class, 
'getProductsByCategorie']);
?>