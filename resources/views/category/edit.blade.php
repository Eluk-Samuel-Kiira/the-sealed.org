@extends('admin.layout')
@section('title','Dashboard | Categories')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">UPDATE CATEGORY</h3>
    </div>

    <form method="POST" action="{{ route('category.update', $category) }}">
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
        <input type="hidden" name="table_updates" value="form_category">
        <div class="card-body">
            <div class="form-group">
                <label for="article_category">Category Name</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $category->category }}">
            </div>
            
            <div class="form-group">
                <label for="article_description">Category Description</label>
                <textarea class="form-control" id="cat_description" name="cat_description">
                {{ $category->cat_description }}
                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection