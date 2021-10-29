<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [HomeController::class, "index"]);

Route::get('/redirects', [HomeController::class, "redirects"]);

Route::get('/users', [AdminController::class, "users"]);

Route::get('/food/new', [FoodController::class, 'new']);

Route::get('/foods', [AdminController::class, 'foods']);

Route::post('/food/create', [FoodController::class, 'create']);

Route::get('/food/edit/{id}', [FoodController::class, 'edit']);

Route::post('/food/update/{id}', [FoodController::class, 'update']);

Route::post('/reservation/create', [ReservationController::class, 'create']);

Route::get('/reservations', [ReservationController::class, 'reservations']);

Route::get('/chef/new', [ChefController::class, 'new']);

Route::post('/chef/create', [ChefController::class, 'create']);

Route::get('/chefs', [ChefController::class, 'chefs']);

Route::get('/chef/edit/{id}', [ChefController::class, 'edit']);

Route::post('/chef/update/{id}', [ChefController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
