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
        $visited_time = now()->format('H:i:s');
        $visited_date = now()->format('Y-m-d');
        $ip = Request::getClientIp();

        $increase = Visitor::where('ip', $ip)->value('visits');
        $increase = $increase+1;
        $vistor = Visitor::updateOrInsert(['ip' => $ip],[
            'visits' => $increase, 'visited_time' => $visited_time, 'visited_date' => $visited_date
        ]);
        
        $articles = Article::with('articles', 'authors')->where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        $news = News::where('status', 1)->orderBy('id', 'desc')->limit(6)->get();
        return view('welcome', compact('articles','news'));
    }
}
