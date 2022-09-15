<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('website.home');
});

Route::get('/about', function(){
    return view('website.about');
});
Route::get('/category', function(){
    return view('website.category');
});
Route::get('/contact', function(){
    return view('website.contact');
});
Route::get('/post', function(){
    return view('website.post');
});

// admin panel routes
Route::get('/admin-panel', function(){
    return view('admin.dashboard.index');
});