<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rproductcontroler;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Include authentication routes
require __DIR__.'/auth.php';

// Direct login/register routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('Home');
});

Route::get('/email', [Rproductcontroler::class, 'email']);
Route::post('/send/email', [Rproductcontroler::class, 'sendEmail'])->name('send.email');

Route::get('/produits', [Rproductcontroler::class, 'index'])->name('produits.index');
Route::view('/about', 'About')->name('about');
Route::get('/contact', function () {
    return view('Contact');
})->name('contact');
Route::post('/contact', [Rproductcontroler::class, 'contact'])->name('contact.store');

// Test email route
Route::get('/test-email', function () {
    try {
        \Mail::to('motichihssan@gmail.com')->send(new \App\Mail\TestMail([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '1234567890',
            'subject' => 'Test Email',
            'message' => 'This is a test email'
        ]));
        return 'Email sent successfully!';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Product Management Routes - Admin only
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/produits/create', [Rproductcontroler::class, 'create'])->name('produits.create');
    Route::post('/produits', [Rproductcontroler::class, 'store'])->name('produits.store');
    Route::get('/produits/{id}/edit', [Rproductcontroler::class, 'edit'])->name('produits.edit');
    Route::put('/produits/{id}', [Rproductcontroler::class, 'update'])->name('produits.update');
    Route::delete('/produits/{id}', [Rproductcontroler::class, 'destroy'])->name('produits.destroy');
    Route::get('/espaceadmin', [Rproductcontroler::class, 'espaceadmin'])->name('espaceadmin');
});

// User routes - USER role only
Route::middleware(['auth', 'useruser'])->group(function () {
    Route::get('/espaceclient', [Rproductcontroler::class, 'espaceclient'])->name('espaceclient');
});


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

require __DIR__.'/auth.php';
