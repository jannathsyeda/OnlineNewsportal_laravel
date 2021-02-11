<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('mainhome');

Route::get('category/{id}', 'CatController@index')->name('category.index');
Route::get('/search', 'SearchController@search')->name('search');


Route::get('posts', 'PostController@index')->name('post.index')->middleware('verified');
Route::get('post/{slug}', 'PostController@details')->name('post.details');

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');


Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin' ,'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::resource('breakingNews','BreakingNewsController');



    Route::get('pending/post','PostController@pending')->name('post.pending');
    Route::put('post/{id}/approve','PostController@approve')->name('post.approve');

    Route::get('author','AuthorController@index')->name('author.index');
    Route::delete('author/{id}','AuthorController@destroy')->name('author.destroy');

    Route::get('subscriber','SubscriberController@index')->name('subscriber.index');
    Route::post('breaking/{id}','SubscriberController@storeBreakingNewsFromNews')->name('breakingNews.post.store');
    Route::delete('subscriber/{subscriber}','SubscriberController@deleteSubscriberFunction')->name('subscriber.destroy');

});

Route::group([ 
    'as' => 'author.', 
    'prefix' => 'author', 
    'namespace' => 'Author', 
    'middleware' => [ 
    'auth', 'author' ,'verified'
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('post','PostController');
});




View::composer('layouts.frontend.partial.footer', function($view){
    $posts = App\Post::latest()->Approved()->take(6)->get();
    $view->with('posts', $posts);
});

View::composer('layouts.frontend.partial.header', function($view){
    $categories = App\Category::latest()->get();
    $view->with('categories', $categories);
});
