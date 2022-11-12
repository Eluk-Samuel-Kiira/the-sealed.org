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
                            Add New Video
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">
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
                                <input type="hidden" id="author" name="author" value="{{ auth()->user()->id }}">
                                <label for="article_category">Video Category</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="video_title">Video Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Video Title">
                            </div>

                            <div class="form-group">
                                <label for="video">Select Video</label>
                                <input class="form-control" id="video" type="file" name="video"/>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit Video</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>  


@endsection

