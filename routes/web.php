<?php

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AdminController;

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

Route::get('/all/activity', [AdminController::class, 'getAllActivity']);
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'dashboardIndex'])->name('home.admin');
    Route::get('/activity', [AdminController::class, 'index'])->name('admin.activity.index');

    Route::get('/activity/create', [AdminController::class, 'create'])->name('admin.activity.create');
    Route::post('/activity/store', [AdminController::class, 'store'])->name('admin.activity.add');
    Route::get('/activity/edit/{id}', [AdminController::class, 'edit'])->name('admin.activity.edit');
    Route::put('/activity/update/{id}', [AdminController::class, 'update'])->name('admin.activity.update');
    Route::delete('/activity/delete/{id}', [AdminController::class, 'destroy'])->name('admin.activity.destroy');

    Route::get('/users', [AdminController::class, 'getUsers'])->name('admin.users.index');
    Route::get('/user/activities/{id}', [AdminController::class, 'getUserActivities'])->name('admin.user.activities');
    Route::get('/user/activity/edit/{activity_id}/{user_id}', [AdminController::class, 'editUserActivity'])->name('admin.activity.edit.user');
    Route::post('/user/activity/update/{activity_id}/{user_id}', [AdminController::class, 'updateUserActivity'])->name('admin.activity.update.user');
    Route::get('/user/activity/create/{user_id}', [AdminController::class, 'createUserActivity'])->name('admin.activity.create.user');
    Route::post('/user/activity/store/{user_id}', [AdminController::class, 'storeUserActivity'])->name('admin.activity.store.user');
});

Route::get('/test', function (Activity $activity) {
    $end = "2022-12-19";
    $start = "2022-12-21";
    return $activity->getActivityCount($start, $end);
});
