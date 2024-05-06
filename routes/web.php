<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(AdminController::class)->middleware('auth', 'verified', 'role:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminDashboard')->name('admin.dashboard');
});


Route::middleware('auth', 'verified')->controller(ProductController::class)->prefix('product')->group(function () {
    Route::get('/showList', 'index')->name('product.index'); //products list
    Route::get('/show', 'show')->name('product.show'); //show all products
    Route::get('/create', 'create')->name('product.create'); //add products view
    Route::post('/store', 'store')->name('product.store'); //add products save
    Route::get('/edit/{id}', 'edit')->name('product.edit'); //edit page
    Route::post('/update', 'update')->name('product.update'); // update page
    Route::get('/delete{id}', 'delete')->name('product.delete');
});

// Route::get('/product/comments', function () {
//     return view('product.comments');
// })->middleware('auth', 'verified');;




require __DIR__ . '/auth.php';
