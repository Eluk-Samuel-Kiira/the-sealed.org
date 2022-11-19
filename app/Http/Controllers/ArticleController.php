<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('articles', 'authors')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {

        $descriptions = $request->descriptions;
        $title = $request->title;
        $writer = $request->writer;
        $category_id = $request->category_id;
        $capt = new Article();

        $image1 = $request->file('image1');
        if($image1 != null) {
            $imageName = time().'.'.$image1->extension();
            $image1->move(storage_path('app/public/Article_Images'),$imageName);
            $capt->image1 = $imageName;
        }

        $image2 = $request->file('image2');
        if($image2 != null) {
            $imageName2 = time().'.'.$image2->extension();
            $image2->move(storage_path('app/public/Article_Images'),$imageName2);
            $capt->image2 = $imageName2;
        }
        
        $capt->descriptions = $descriptions;
        $capt->author = $writer;
        $capt->title = $title;
        $capt->category_id = $category_id;
        $capt->save();

        return redirect()->route('article.index')->with('status', 'New Article Has Been Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = category::all();
        return view('articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->validated());

        $image1 = $request->file('image1');
        if($image1 != null) {
            $imageName = time().'.'.$image1->extension();
            $image1->move(storage_path('app/public/Article_Images'),$imageName);
            //$article->image1 = $imageName;
            $article->update(['image1' => $imageName]);
        }

        $image2 = $request->file('image2');
        if($image2 != null) {
            $imageName2 = time().'.'.$image2->extension();
            $image2->move(storage_path('app/public/Article_Images'),$imageName2);
            //$article->image2 = $imageName2;
            $article->update(['image2' => $imageName2]);
        }

        $article->title = $request->input('title');
        $article->category_id = $request->input('category_id');
        $article->descriptions = $request->input('descriptions');
        return redirect()->route('article.index')->with('status', 'The Article Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $fileloc1 = 'app/public/Article_Images/'.$article->image1;
        $filename1 = storage_path($fileloc1);

        $fileloc = 'app/public/Article_Images/'.$article->image2;
        $filename = storage_path($fileloc);

        if(File::exists($filename1)) {
            File::delete($filename1);
        }
        if(File::exists($filename)) {
            File::delete($filename);
        }
        return redirect()->back()->with('status', 'The Article Has Been Deleted Successfully');
    }

}
