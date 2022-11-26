<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use App\Models\Article;
use App\Models\category;
use App\Models\News;
use Request;


class GeneralController extends Controller
{
    

    public function home()
    {
        $ip = Request::getClientIp();
        $visited_date = Date("Y-m-d:H:i:s");
        $vistor = Visitor::where('ip', $ip)->updateOrCreate(['ip' => $ip, 'visited_date' => $visited_date],[
            'ip' => $ip,
            'visited_date' => $visited_date
        ]);
        $vistor->increment('visits');
        

        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $articles = Article::with('articles', 'authors')->where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        $news = News::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        return view('welcome', compact('articles','categories','news'));
    }
}
