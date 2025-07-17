<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;



Route::get('/', function () {
    return view('welcome');
});

// ✅ Modified this dashboard route to pass products from DB
Route::get('/dashboard', function () {
    $products = Product::inRandomOrder()->get(); // Fetch all products in random order
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/picture', [ProfileController::class, 'updatePicture'])->name('profile.update.picture');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/products', [AdminProductController::class, 'index'])->name('products');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders');
    Route::post('/orders/{order}/deliver', [AdminOrderController::class, 'markAsDelivered'])->name('orders.deliver');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
});

// Show the forgot password form
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

// Send reset link to email
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

// Show the reset password form (from email link)
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');
    
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.form');
Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');


// Update password in the database
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');
    Route::get('/place-order', [PlaceOrderController::class, 'index'])->name('orders.place');
    //checkout
 Route::middleware(['auth'])->group(function () {
    Route::get('/checkout/{product}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    
});

Route::get('/confirm-order', [OrderController::class, 'confirmOrder'])
    ->name('orders.confirm')
    ->middleware('auth');

    // View Cart Page (Reset Cart UI)
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');

// Remove a single item from cart
Route::delete('/cart/{id}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

// Reset entire cart
Route::delete('/cart-reset', [\App\Http\Controllers\CartController::class, 'reset'])->name('cart.reset');


Route::get('/browse-products', [ProductController::class, 'browse'])->name('products.browse');

// Product upload routes for admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
});

require __DIR__.'/auth.php';

