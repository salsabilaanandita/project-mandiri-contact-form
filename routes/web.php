<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
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

// Route::get('/', action: function () {
//     return view('home');
// });

Route::get('/', [Controller::class, 'landing'])->name('home');

Route::prefix('/contacts')->name('contacts.')->group(function(){
    Route::get('/add', [ContactController::class, 'create'])->name('create');
    Route::post('/add', [ContactController::class, 'store'])->name('store');
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [ContactController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [ContactController::class, 'update'])->name('contacts.update');
    // Route::put('/edit/{id}', [ContactController::class, 'updateStock'])->name('update.stock');
    // Route::get('/contacts/{id}/profile', [ContactController::class, 'showProfile'])->name('contacts.profile');
});

