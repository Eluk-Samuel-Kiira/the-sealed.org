@extends('layouts.landingpage')
@section('title','THE SEALED | Articles')
@section('content')

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-60 rounded mb-5" src="{{ asset('storage/Article_Images')}}/{{$article->image1 }}" style="max-width: 400px" alt="">
                    <h1 class="text-uppercase mb-4">{{ $article->title }}</h1>
                    <p>{{ $article->descriptions }}</p>
                    <img class="img-fluid w-60 rounded mb-5" src="{{ asset('storage/Article_Images')}}/{{$article->image2 }}" style="max-width: 400px" alt="">
                    <h6>Author: {{ $article->authors->name }} <small><i> --{{ $article->date }}</i></small></h6>
                </div>
                <!-- Blog Detail End -->

                <!-- Comment List Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Comments</h3>
                    @foreach ($comments as $comment)
                        <div class="d-flex mb-4">
                            <img src="img/avatar.jpeg" class="img-fluid" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6>{{ $comment->visitor }} <small><i>{{ $comment->date }}</i></small></h6>
                                <p>{{ $comment->comment }}</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>    
                        </div>
                    @endforeach
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light p-5">
                    <h3 class="text-uppercase mb-4">Leave a comment</h3>
                    <form method="POST" action="{{ route('comment.store') }}">
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
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="visitor" id="visitor" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea name="comment" id="comment" class="form-control bg-white border-0" rows="5" placeholder="Your Comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Recent Post</h3>
                    <div class="bg-light p-4">
                        @foreach ($posts as $post)
                            @if($post->articles->status == 1)
                                <div class="d-flex mb-3">
                                    <img class="img-fluid" src="{{ asset('storage/Article_Images')}}/{{$post->image1 }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                    <a href="{{ route('description.more', $post) }}" class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0">{{ $post->title }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Recent Post End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
    <!-- Blog End -->

@endsection