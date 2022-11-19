@extends('layouts.landingpage')
@section('title','THE SEALED | Videos')
@section('content')

    <!-- Videos  -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Heart Touching Videos</h1>
        </div>
        <div class="row g-5">
            @foreach ($videos as $video)
                @if($video->videos->status == 1)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="row g-0">
                            <div class="col-10" style="min-height: 300px;">
                                <div class="position-relative h-100">
                                    <video width="280" height="400" controls>
                                        <source src="{{ asset('storage/Video')}}/{{$video->video }}" type="video/mp4">
                                        <source src="mov_bbb.ogg" type="video/ogg">
                                        Your browser does not support HTML video.
                                    </video>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-light p-4">
                                    <h4>{{ $video->title }}</h4>
                                    <span>Category: {{ $video->videos->category }} <small><i> --{{ $video->date }}</i></small></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Videos -->

@endsection