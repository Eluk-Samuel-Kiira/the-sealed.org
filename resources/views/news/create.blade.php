@extends('admin.layout')
@section('title','Dashboard | News')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add Featured News
                        </h3>
                    </div>
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
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
                            <input type="hidden" id="writer" name="writer" value="{{ auth()->user()->id }}">
                                
                            <div class="form-group">
                                <label for="article_title">News Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter News Title">
                            </div>

                            <div class="form-group">
                                <label for="image">Image </label><br>
                                <img id="photo" alt="" width="100" height="100" />
                                <input class="form-control" id="image" type="file" name="image" 
                                    onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>

                            <div class="form-group">
                                <label for="image_description">Image Description</label>
                                <input type="text" class="form-control" id="image_details" name="image_details" placeholder="Enter Image Description">
                            </div>

                            <div class="card-body">
                                <label for="article_description">News Body</label>
                                <textarea id="summernote" id="descriptions" name="descriptions">
                                    Text Here
                                </textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit News</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>  


@endsection

