<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; /** Let's Import View Facade **/
use App\Http\Controllers;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Comment;
use App\Models\Article;
use App\Models\category;
use DB;

class MasterViewServicerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $users = User::count();
        View::share('users', $users);

        $visitor_details = Visitor::count();
        View::share('visitor_details', $visitor_details);

        $comment = Comment::count();
        View::share('comment', $comment);
        
        $session = DB::table('sessions')->count();
        View::share('session', $session);

        $approve = Article::with('authors')->where('status', 0)->get();
        View::share('approve', $approve);

        $article_count = Article::where('status', 0)->count();
        View::share('article_count', $article_count);


        //visitors side
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        View::share('categories', $categories);


        
    }
}
