<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\category;
use App\Models\Comment;
use App\Models\Video;
use App\Models\Testimony;
use App\Models\News;
use App\Models\Visitor;
use File;
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

    public function activate_news(Request $req)
    {
        $news = News::where('id', $req->id)->first();
        if($news->status == 1) {
            News::where('id', $news->id)->update(['status' => 0]);
            return redirect()->back()->with('status', 'The Featured News Has Been Deactivated Successfully');
        }else {
            News::where('id', $news->id)->update(['status' => 1]);
            return redirect()->back()->with('status', 'The Featured News Has Been Activated Successfully');
        }
    } 

    public function user()
    {
        return view('profile.user');
    }
    

    public function details(Request $request)
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $article = Article::where('id', $request->id)->first();
        $comments = Comment::where('article_id', $request->id)->orderBy('id', 'desc')->limit(5)->get();
        $posts = Article::where('status', 1)->orderBy('id', 'desc')->limit(3)->get();
        return view('articles.readmore', compact('article','categories','comments','posts'));
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

    public function activate_video(Request $req)
    {
        $video = Video::where('id', $req->id)->first();
        if($video->status == 1) {
            Video::where('id', $video->id)->update(['status' => 0]);
            return redirect()->back()->with('status', 'The Video Has Been Deactivated Successfully');
        }else {
            Video::where('id', $video->id)->update(['status' => 1]);
            return redirect()->back()->with('status', 'The Video Has Been Activated Successfully');
        }
    }

    public function display_videos()
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $videos = Video::where('status',1)->orderBy('id','desc')->get();
        return view('videos.videoplay', compact('videos','categories'));
    }

    public function store_testimony(Request $request)
    {
        $person = $request->person;
        $location = $request->location;
        $testimony = $request->testimony;
        $capt = new Testimony();

        $photo = $request->file('photo');
        if($photo != null) {
            $imageName = time().'.'.$photo->extension();
            $photo->move(storage_path('app/public/Testimony_Images'),$imageName);
            $capt->photo = $imageName;
        }

        $capt->person = $person;
        $capt->location = $location;
        $capt->testimony = $testimony;
        $capt->save();
        return redirect()->back()->with('status', 'Testimony Shared Successfully');;
    }

    public function adminTestimony()
    {
        $testimonies = Testimony::all();
        return view('testimonies.index', compact('testimonies'));
    }


    public function deleteTestimony(Request $request)
    {
        $testimony = Testimony::findOrFail($request->id);
        $testimony->delete();

        $fileloc = 'app/public/Testimony_Images/'.$testimony->photo;
        $filename = storage_path($fileloc);

        if(File::exists($filename)) {
            File::delete($filename);
        }
        return redirect()->back()->with('status', 'The Testimony Has Been Deleted Successfully');
    }

    public function view_testimony()
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $testimonies = Testimony::orderBy('id', 'desc')->limit(12)->get();
        return view('testimonies.view', compact('testimonies','categories'));
    }

    public function show_testimony(Request $request)
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $testimony = Testimony::where('id', $request->id)->first();
        return view('testimonies.show', compact('testimony','categories'));
    }

    public function news_details(Request $request)
    {
        $categories = category::where('status', 1)->orderBy('id', 'desc')->get();
        $news = News::where('id', $request->id)->first();
        $posts = News::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        return view('news.readmore', compact('news','categories','posts'));
    }
}
