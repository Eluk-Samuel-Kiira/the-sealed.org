<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use App\Models\category;
use File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos_post = Video::with('videos', 'authorz')->get();
        return view('videos.index', compact('videos_post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $title = $request->title;
        $author = $request->author;
        $category_id = $request->category_id;
        $capt = new Video();

        $video = $request->file('video');
        if($video != null) {
            $videoName = time().'.'.$video->extension();
            $video->move(storage_path('app/public/Video'),$videoName);
            $capt->video = $videoName;
        }
        $capt->author = $author;
        $capt->title = $title;
        $capt->category_id = $category_id;
        $capt->save();

        $videos_post = Video::with('videos', 'authorz')->get();
        return view('videos.index', compact('videos_post'))->with('status', 'New Video Has Been Posted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        $fileloc = 'app/public/Video/'.$video->video;
        $filename = storage_path($fileloc);

        if(File::exists($filename)) {
            File::delete($filename);
        }
        return redirect()->back()->with('status', 'The Video Has Been Deleted Successfully');
    }
}
