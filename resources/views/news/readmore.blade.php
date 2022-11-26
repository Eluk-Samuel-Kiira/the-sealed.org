@extends('layouts.landingpage')
@section('title','THE SEALED | Featured News')
@section('content')

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-60 rounded mb-5" src="{{ asset('storage/News_Images')}}/{{$news->image }}" style="max-width: 400px" alt="">
                    <h1 class="text-uppercase mb-4">{{ $news->title }}</h1>
                    <p>{{ $news->news }}</p>
                    <h6>Author: {{ $news->writer->name }} <small><i> --{{ $news->date }}</i></small></h6>
                </div>
                <!-- Blog Detail End -->
            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">

                <!-- Recent Post Start -->
                <div class="mb-5">
                    <h3 class="text-uppercase mb-4">Recent Posts</h3>
                    <div class="bg-light p-4">
                        @foreach ($posts as $post)
                            <div class="d-flex mb-3">
                                <img class="img-fluid" src="{{ asset('storage/News_Images')}}/{{$post->image }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                <a href="{{ route('news.details', $post) }}" class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0">{{ $post->title }}
                                </a>
                            </div>
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