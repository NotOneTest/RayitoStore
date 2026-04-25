<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductController::class, 'index'])->name('products.index');
Route::get('/productos/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrito/agregar', [CartController::class, 'add'])->name('cart.add');
Route::put('/carrito/{item}/actualizar', [CartController::class, 'update'])->name('cart.update');
Route::delete('/carrito/{item}/eliminar', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/carrito/vaciar', [CartController::class, 'clear'])->name('cart.clear');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/procesar', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/mis-pedidos', [CheckoutController::class, 'orders'])->name('checkout.orders');
    Route::get('/mis-pedidos/{order}', [CheckoutController::class, 'orderDetail'])->name('checkout.order-detail');
});

Route::prefix('info')->name('info.')->group(function () {
    Route::get('/sobre-nosotros', [InfoController::class, 'about'])->name('about');
    Route::get('/mision-vision', [InfoController::class, 'mission'])->name('mission');
    Route::get('/como-comprar', [InfoController::class, 'howToBuy'])->name('how-to-buy');
    Route::get('/contacto', [InfoController::class, 'contact'])->name('contact');
    Route::post('/contacto', [InfoController::class, 'submitContact']);
});

Route::prefix('foro')->name('forum.')->group(function () {
    Route::get('/', [ForumController::class, 'index'])->name('index');
    Route::get('/crear', [ForumController::class, 'create'])->name('create');
    Route::post('/', [ForumController::class, 'store'])->name('store');
    Route::get('/{question}', [ForumController::class, 'show'])->name('show');
    Route::post('/{question}/respuesta', [ForumController::class, 'answer'])->name('answer');
    Route::post('/respuesta/{answer}/aceptar', [ForumController::class, 'acceptAnswer'])->name('accept-answer');
});

Route::get('/categoria/{slug}', [ProductController::class, 'index'])->name('category.show');
Route::get('/etiqueta/{slug}', [ProductController::class, 'index'])->name('tag.show');
