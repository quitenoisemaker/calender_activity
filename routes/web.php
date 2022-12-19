<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('home.admin');
    Route::get('/activity', [AdminController::class, 'activityIndex'])->name('admin.activity.index');
    Route::get('/activity/create', [AdminController::class, 'create'])->name('admin.activity.create');
    Route::post('/activity/store', [AdminController::class, 'store'])->name('admin.activity.add');
    Route::get('/activity/edit/{id}', [AdminController::class, 'edit'])->name('admin.activity.edit');
    Route::put('/activity/update/{id}', [AdminController::class, 'update'])->name('admin.activity.update');
    Route::delete('/activity/delete/{id}', [AdminController::class, 'destroy'])->name('admin.activity.destroy');
});
