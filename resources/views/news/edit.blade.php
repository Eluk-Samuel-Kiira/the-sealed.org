@extends('admin.layout')
@section('title','Dashboard | News')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">UPDATE FEATURED</h3>
    </div>

    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data">
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
                <label for="title">News Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
            </div>

            <div class="form-group">
                <label for="image1">Edit Image</label><br>
                <img id="blahss" alt="" width="100" height="100" />
                <input class="form-control" id="image" type="file" name="image" 
                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])"/>
            </div>

            <div class="form-group">
                <label for="title">Image Description</label>
                <input type="text" class="form-control" id="image_description" name="image_description" value="{{ $news->image_description }}">
            </div>
            
            <div class="form-group">
                <label for="article_description">News Description</label>
                <textarea class="form-control" id="news" name="news">
                {{ $news->news }}
                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection