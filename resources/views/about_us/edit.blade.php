@extends('admin.layout')
@section('title','Dashboard | About Us')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">UPDATE ABOUT US</h3>
    </div>

    <form method="POST" action="{{ route('about.post', $editabout->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="image1">Edit Image 1</label><br>
                <img id="blahss" alt="" width="100" height="100" required/>
                <input class="form-control" id="image" type="file" name="image" 
                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])" required/>
            </div>

            <div class="card-body">
                <label for="article_description">News Body</label>
                <textarea id="summernote" id="description" name="description">
                    {{ $editabout->description }}
                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection