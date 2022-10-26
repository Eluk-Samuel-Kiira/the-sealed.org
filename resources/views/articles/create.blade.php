@extends('admin.layout')
@section('title','Dashboard | Articles')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add New Article
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
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
                                <input type="hidden" id="writer" name="writer" value="{{ auth()->user()->id }}">
                                <label for="article_category">Article Category</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="article_title">Article Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Article Title">
                            </div>

                            <div class="form-group">
                                <label for="image1">Image 1</label><br>
                                <img id="blahss" alt="" width="100" height="100" />
                                <input class="form-control" id="image1" type="file" name="image1" 
                                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2</label><br>
                                <img id="blah" alt="" width="100" height="100" />
                                <input class="form-control" id="image2" type="file" name="image2" 
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>

                            <div class="card-body">
                                <label for="article_description">Article Description</label>
                                <textarea id="summernote" id="descriptions" name="descriptions">
                                    Text Here
                                </textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit Article</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>  


@endsection

