<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('writer')->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        
        $descriptions = $request->descriptions;
        $title = $request->title;
        $writer = $request->writer;
        $image_details = $request->image_details;

        $capt = new News();
        $image = $request->file('image');
        if($image != null) {
            $imageName = time().'.'.$image->extension();
            $image->move(storage_path('app/public/News_Images'),$imageName);
            $capt->image = $imageName;
        }

        $capt->news = $descriptions;
        $capt->author = $writer;
        $capt->title = $title;
        $capt->image_description = $image_details;
        $capt->save();
        return redirect()->route('news.index')->with('status', 'New Featured News Has Been Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());
        $image = $request->file('image');
        if($image != null) {
            $imageName = time().'.'.$image->extension();
            $image->move(storage_path('app/public/News_Images'),$imageName);
            $news->update(['image' => $imageName]);
        }
        $news->title = $request->input('title');
        $news->image_description = $request->input('image_description');
        $news->news = $request->input('news');
        return redirect()->route('news.index')->with('status', 'The Featured News Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        $fileloc = 'app/public/News_Images/'.$news->image;
        $filename = storage_path($fileloc);

        if(File::exists($filename)) {
            File::delete($filename);
        }
        return redirect()->back()->with('status', 'The Featured News Has Been Deleted Successfully');
    }
}
