<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\category;
use App\Models\Comment;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    
    public function activate(Request $req)
    {
        $article = Article::where('id', $req->id)->first();
        if($article->status == 1) {
            Article::where('id', $article->id)->update(['status' => 0]);
            return redirect()->back()->with('status', 'The Article Has Been Deactivated Successfully');
        }else {
            Article::where('id', $article->id)->update(['status' => 1]);
            return redirect()->back()->with('status', 'The Article Has Been Activated Successfully');
        }
    }

    public function user()
    {
        return view('profile.user');
    }
    

    public function home()
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $articles = Article::with('articles', 'authors')->where('status', 1)->orderBy('id', 'desc')->get();
        return view('welcome', compact('articles','categories'));
    }

    public function details(Request $request)
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $article = Article::where('id', $request->id)->first();
        $comments = Comment::where('article_id', $request->id)->orderBy('id', 'desc')->limit(5)->get();
        $posts = Article::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        return view('readmore', compact('article','categories','comments','posts'));
    }

    public function comments(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'visitor' => 'required|max:255',
            'comment' => 'required|max:2000',
            'article_id' => 'required',
        ]);

        Comment::create($input);
        return back();
    }

    public function showArticles(Request $request)
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $category = category::where('id', $request->id)->first();
        $articles = Article::where('category_id', $request->id)->where('status', 1)->get();
        return view('articles', compact('categories','category','articles')); 
    }

}
