<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StartController;
use App\Http\Controllers\BaseController;

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
//Route::get('/', [DashboardController::class, 'start'])->name('start');
Route::get('/',function () { return Inertia::render('Start'); })->name('start');
Route::get('products', [DashboardController::class, 'index'])->name('products');
//Route::resource('products', 'ProductsController');
//Route::get('product/edit', [ProductController::class, 'index']);
//Route::get('products/create', [ProductController::class, 'index']);

  Route::get('products/create', [DashboardController::class, 'create'])
    ->name('products.create');
	
  Route::get('products/{product}/edit', [DashboardController::class, 'edit'])
    ->name('products.edit');
	
  Route::put('products/{id}', [DashboardController::class, 'update'])
    ->name('products.update');
	
  Route::post('products/store', [DashboardController::class, 'store'])
    ->name('products.store');
	
  Route::delete('products/destroy/{product}', [DashboardController::class, 'destroy'])
    ->name('products.destroy');
	
///////////////////////////////////////////////////////////////////////////////////////////////////
//Вспомогательный маршрут для записи флага admin/user в файл т.к. нет таблицs Users для этого
  Route::post('flagadmin/{flag}', [BaseController::class, 'flagadmin'])
    ->name('flagadmin'); 

//Route::get('/home', [DashboardController::class, 'index'])->name('home');
//Route::get('/adminpanel', [DashboardController::class, 'index'])->name('adminpanel');
/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */

/* Route::middleware(['auth:sanctum', 'verified'])->get('/nome', function () {
    return Inertia::render('Home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/adminpanel', function () {
    return Inertia::render('Adminpanel');
})->name('adminpanel');
 */