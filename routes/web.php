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


Route::get('/', [App\Http\Controllers\OtherController::class, 'home'])->name('welcome');
Route::get('/blog/{id}', [App\Http\Controllers\OtherController::class, 'details'])->name('description.more');
Route::post('/blog/comment', [App\Http\Controllers\OtherController::class, 'comments'])->name('comment.store');
Route::get('/article-category/{id}', [App\Http\Controllers\OtherController::class, 'showArticles'])->name('category.more');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('video', \App\Http\Controllers\VideoController::class);

    Route::get('/activate/article/{id}', [App\Http\Controllers\OtherController::class, 'activate'])->name('article.activate');
    Route::get('/details/profile', [App\Http\Controllers\OtherController::class, 'user'])->name('logged.user');


});
