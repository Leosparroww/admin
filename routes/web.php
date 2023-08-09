<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::redirect('/dashboard', 'item');

    // Route::get('/dashboard', function () {
    //     return view('item.itemList');
    // })->name('dashboard');
    Route::prefix('item')->group(function () {
        Route::get('', [ItemController::class, 'item'])->name('item');
        Route::get('createPage', [ItemController::class, 'itemCreatePage'])->name('item#createPage');
        Route::post('create', [ItemController::class, 'itemCreate'])->name('item#create');
        Route::get('ajax/delete', [ItemController::class, 'itemDelete']);
        Route::get('ajax/publish', [ItemController::class, 'itemPublish']);
    });
    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'category'])->name('category');
        Route::get('categoryCreate', [CategoryController::class, 'categoryCreatePage'])->name('category#createPage');
        Route::post('categoryCreate', [CategoryController::class, 'categoryCreate'])->name('category#create');
        Route::get('ajax/delete', [CategoryController::class, 'categoryDelete']);
        Route::get('ajax/publish', [CategoryController::class, 'categoryPublish']);
    });

});
