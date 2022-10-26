@extends('admin.layout')
@section('title','Dashboard | Categories')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADD NEW CATEGORY</h3>
    </div>

    <form method="POST" action="{{ route('category.store') }}">
        @csrf    
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
                <label for="article_category">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name">
            </div>
            
            <div class="form-group">
                <label for="article_description">Category Description</label>
                <textarea class="form-control" id="cat_description" name="cat_description" placeholder="Enter category description" rows="4" cols="50">

                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

@endsection