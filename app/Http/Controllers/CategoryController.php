<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        category::create($request->validated());
        $post = new category;
        $post->category = $request->category;
        $post->cat_description = $request->cat_description;
        return redirect()->route('category.index')->with('status', 'New Category Has Been inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        if($category->status == 1) {
            category::where('id', $category->id)->update(['status' => 0]);
            return redirect()->route('category.index')->with('status', 'The Category Has Been Deactivated Successfully');
        }else {
            category::where('id', $category->id)->update(['status' => 1]);
            return redirect()->route('category.index')->with('status', 'The Category Has Been Activated Successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        $category->update($request->validated());
        $category->category = $request->input('category');
        $category->cat_description = $request->input('cat_description');
        return redirect()->route('category.index')->with('status', 'The Category Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('status', 'The Category Has Been Deleted Successfully');
    }

}
