<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    if(Auth::check())
    {
        return view('dashboard');
    }
    else
    {
    return view('auth.login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Product
    Route::get('/dashboard/show-product-page', [ProductController::class, 'showProductPage'])->name('product.show');
    Route::get('/dashboard/edit-product-page', [ProductController::class, 'editProductPage'])->name('product.edit');
    Route::get('/dashboard/create-product-page', [ProductController::class, 'createProductPage'])->name('product.create');

});

require __DIR__.'/auth.php';
