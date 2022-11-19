@extends('admin.layout')
@section('title','Dashboard | Article')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">UPDATE ARTICLE</h3>
    </div>

    <form method="POST" action="{{ route('article.update', $article) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="article_category">Article Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select Category Name</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Article Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
            </div>

            <div class="form-group">
                <label for="image1">Edit Image 1</label><br>
                <img id="blahss" alt="" width="100" height="100" />
                <input class="form-control" id="image1" type="file" name="image1" 
                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])"/>
            </div>

            <div class="form-group">
                <label for="image2">Edit Image 2</label><br>
                <img id="blah" alt="" width="100" height="100" />
                <input class="form-control" id="image2" type="file" name="image2" 
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
            </div>
            
            <div class="form-group">
                <label for="article_description">Article Description</label>
                <textarea class="form-control" id="descriptions" name="descriptions">
                {{ $article->descriptions }}
                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection