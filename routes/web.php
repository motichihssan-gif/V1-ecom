<?php

use App\Http\Controllers\ProductController;
<<<<<<< HEAD
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rproductcontroler;

=======
use App\Http\Controllers\Rproductcontroler;
use Illuminate\Support\Facades\Route;
>>>>>>> e0ac472 (push)

Route::get('/', function () {
    return view('Home');
});

Route::get('/produits', [Rproductcontroler::class, 'index'])->name('produits.index');
Route::view('/about', 'About')->name('about');
Route::view('/contact', 'Contact')->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Management Routes
    Route::get('/produits/create', [Rproductcontroler::class, 'create'])->name('produits.create');
    Route::post('/produits', [Rproductcontroler::class, 'store'])->name('produits.store');
    Route::get('/produits/{id}/edit', [Rproductcontroler::class, 'edit'])->name('produits.edit');
    Route::put('/produits/{id}', [Rproductcontroler::class, 'update'])->name('produits.update');
    Route::delete('/produits/{id}', [Rproductcontroler::class, 'destroy'])->name('produits.destroy');
});

<<<<<<< HEAD
// Route::get('/products', function () {
//     $products = Product::paginate(6);
    
//     return view('Produits', ['products' => $products, 'categorie' => 'Tous']);
// });

// Route::get('/produits/{cat}', [ProductController::class, 'getProductsByCategorie'])
//     ->name('produits.categorie');

Route::get('/produits/{cat}', [ProductController::class, 
'getProductsByCategorie']);
Route::resource('products',Rproductcontroler::class);




Route::get('/session-test', function () {
    session(['ok' => 'yes']);
    return session('ok');
});

?>
=======
require __DIR__.'/auth.php';
>>>>>>> e0ac472 (push)
