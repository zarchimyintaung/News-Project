<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\NewsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\NewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


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
// Frontend
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/news/categories/{id}',[HomeController::class,'newsByCat'])->name('news.cat');
Route::get('/news',[NewController::class,'index'])->name('news');
Route::get('/news/details/{id}',[NewController::class,'show'])->name('news.details');
Route::get('/news/filter',[NewController::class,'filter'])->name('news.filter');
Route::get('/news/search',[NewController::class,'search'])->name('news.search');

// Admin
Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    // Categories
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/categories/{category}/update',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/categories/{category}/delete',[CategoryController::class,'delete'])->name('categories.delete');

    // News
    Route::get('/new',[NewsController::class,'index'])->name('news.index');
    Route::get('/news/create',[NewsController::class,'create'])->name('news.create');
    Route::post('/news/store',[NewsController::class,'store'])->name('news.store');
    Route::get('/news/{new}',[NewsController::class,'show'])->name('news.show');
    Route::get('/news/{new}/edit',[NewsController::class,'edit'])->name('news.edit');
    Route::post('/news/{new}/update',[NewsController::class,'update'])->name('news.update');
    Route::get('/news/{new}/delete',[NewsController::class,'delete'])->name('news.delete');
});

Auth::routes();




