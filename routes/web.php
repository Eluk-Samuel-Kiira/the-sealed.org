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
use App\Models\Visitor;
use App\Models\User;
use App\Models\Comment;
use App\Models\Article;
use Stevebauman\Location\Facades\Location;
use DB;

Route::get('/', [App\Http\Controllers\GeneralController::class, 'home'])->name('welcome');
Route::get('/blog/{id}', [App\Http\Controllers\OtherController::class, 'details'])->name('description.more');
Route::post('/blog/comment', [App\Http\Controllers\OtherController::class, 'comments'])->name('comment.store');
Route::get('/article-category/{id}', [App\Http\Controllers\OtherController::class, 'showArticles'])->name('category.more');
Route::get('/videos-blog', [App\Http\Controllers\OtherController::class, 'display_videos'])->name('video.blog');

// Features and news
Route::get('/features/news/{id}', [App\Http\Controllers\OtherController::class, 'news_details'])->name('news.details');

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
        $users = User::count();
        $visitor_details = Visitor::count();
        $comment = Comment::count();
        $session = DB::table('sessions')->count();
        $approve = Article::with('authors')->where('status', 0)->get();
        $article_count = Article::where('status', 0)->count();
        return view('dashboard', compact('visitor_details', 'users', 'comment', 'session','approve',
        'article_count'));
    })->name('dashboard');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('article', \App\Http\Controllers\ArticleController::class);
    Route::resource('video', \App\Http\Controllers\VideoController::class);
    Route::resource('news', \App\Http\Controllers\NewsController::class);

    Route::get('/activate/article/{id}', [App\Http\Controllers\OtherController::class, 'activate'])->name('article.activate');
    Route::get('/activate/video/{id}', [App\Http\Controllers\OtherController::class, 'activate_video'])->name('video.activate');
    Route::get('/activate/featured/news/{id}', [App\Http\Controllers\OtherController::class, 'activate_news'])->name('news.activate');
    Route::get('/details/profile', [App\Http\Controllers\OtherController::class, 'user'])->name('logged.user');
    Route::get('/persons/testimony', [App\Http\Controllers\OtherController::class, 'adminTestimony'])->name('testimony.person');
    Route::delete('/destory/testimony/{id}', [App\Http\Controllers\OtherController::class, 'deleteTestimony'])->name('testimony.destroy');

    //statistics

});
