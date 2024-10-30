<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
// routes/web.php

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// use App\Http\Controllers\AdminController;

// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
// Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');


Route::get('/', [OrderController::class, 'index'])->name('kiosk.index');
Route::post('/add-to-order', [OrderController::class, 'addToOrder'])->name('order.add');
Route::post('/remove-from-order', [OrderController::class, 'removeFromOrder'])->name('order.remove');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/orders/view', [OrderController::class, 'viewOrders'])->name('orders.view');



// Show the form to add a new item
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// Store the newly created item
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::get('items', [ItemController::class, 'index'])->name('items.index');

Route::resource('items', ItemController::class);

Route::post('/order/update', [OrderController::class, 'update'])->name('order.update');
