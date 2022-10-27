<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\category;

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

}
