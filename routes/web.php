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
use App\Http\Controllers;

Route::get('/', [App\Http\Controllers\OtherController::class, 'home'])->name('welcome');
Route::get('/blog/{id}', [App\Http\Controllers\OtherController::class, 'details'])->name('description.more');
Route::post('/blog/comment', [App\Http\Controllers\OtherController::class, 'comments'])->name('comment.store');
Route::get('/article-category/{id}', [App\Http\Controllers\OtherController::class, 'showArticles'])->name('category.more');
Route::get('/videos-blog', [App\Http\Controllers\OtherController::class, 'display_videos'])->name('video.blog');

// Testimony
Route::post('/testimony/store', [App\Http\Controllers\OtherController::class, 'store_testimony'])->name('testimony.store');
Route::get('/testimony/view', [App\Http\Controllers\OtherController::class, 'view_testimony'])->name('testimony.view');
Route::get('/testimony/show/{id}', [App\Http\Controllers\OtherController::class, 'show_testimony'])->name('testimony.show');

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
    Route::get('/activate/video/{id}', [App\Http\Controllers\OtherController::class, 'activate_video'])->name('video.activate');
    Route::get('/details/profile', [App\Http\Controllers\OtherController::class, 'user'])->name('logged.user');
    Route::get('/persons/testimony', [App\Http\Controllers\OtherController::class, 'adminTestimony'])->name('testimony.person');
    Route::delete('/destory/testimony/{id}', [App\Http\Controllers\OtherController::class, 'deleteTestimony'])->name('testimony.destroy');


});
