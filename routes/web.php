<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
    'prefix' => 'admin',
    //'middleware' => ['role:admin'],
], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');
/*
    Route::resource('/users', [UsersController::class]);
    Route::resource('/images', [ImagesController::class]);
    Route::resource('/categories', [CategoriesController::class]);
    Route::resource('/locations', [LocationsController::class]);

    Route::post('admin/ajaxRequest', [UsersController::class, 'resetPassword'])->name('resetPass');
*/
});
