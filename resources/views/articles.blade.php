@extends('layouts.landingpage')
@section('title','THE SEALED | Articles')
@section('content')

    <!-- Articles under each category starts  -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">{{ $category->category }}</h1>
        </div>
        <div class="row g-5">
            @foreach ($articles as $article)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="{{ asset('storage/Article_Images')}}/{{$article->image1 }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light p-4">
                                <h6 class="text-lowercase"><a href="{{ route('description.more', $article) }}">{{ $article->title }}</a></h6>
                                <span>Author: {{ $article->authors->name }} <small><i> --{{ $article->date }}</i></small></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Articles under each category ends  -->

@endsection