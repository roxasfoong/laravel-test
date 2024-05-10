<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClassRoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboard
    Route::get('/dashboard', [ProductController::class, 'listAllProduct'])->name('dashboard');

    //Product
    Route::get('/dashboard/show-product-page/{productID}', [ProductController::class, 'showProductPage'])->name('product.show');
    Route::get('/dashboard/delete-product/{productID}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    Route::get('/dashboard/edit-product-page/{productID}', [ProductController::class, 'editProductPage'])->name('product.edit');
    Route::post('/dashboard/edit-product', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::get('/dashboard/create-product-page', [ProductController::class, 'createProductPage'])->name('product.create.page');
    Route::post('/dashboard/create-product', [ProductController::class, 'createProduct'])->name('product.create');

});

require __DIR__.'/auth.php';
