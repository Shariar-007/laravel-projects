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

// frontend routing
Route::get('/', 'FrontendController@home')->name('website');
Route::get('/about', 'FrontendController@about')->name('website.about');
Route::get('/category', 'FrontendController@category')->name('website.category');
Route::get('/contact', 'FrontendController@contact')->name('website.contact');
Route::get('/post/{slug}', 'FrontendController@post')->name('website.post');

// Route::get('/admin-panel', function(){
//     return view('admin.dashboard.index');
// });

// admin panel routes 'middleware' => ['auth']
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', function(){
      return view('admin.dashboard.index');
    });
    
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
    Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
});

// Route::get('/test', function(){
//   $id=rand(1,100);
//   $posts = App\Models\Post::all();
//   foreach($posts as $post) {
//     $post->image = "https://placeimg.com/640/480/any/".$id;
//     $post->save();
//     $id++;
//   }
//   return $posts;
// });

