@extends('layouts.landingpage')
@section('title','THE SEALED | Testimonies')
@section('content')

        <!-- Testimonies Start -->
        <div class="container-fluid bg-light py-6 px-5" id="testimonies">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4">Your <span class="text-warning">Testimonies</span></h1>
            </div>
            <div class="row g-5">
                @foreach ($testimonies as $testimony)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-white rounded d-flex flex-column align-items-center text-center">
                            <img class="img-fluid" src="{{ asset('storage/Testimony_Images')}}/{{$testimony->photo }}" style="max-width: 300px" alt="">
                            <div class="px-4 pb-4">
                                <h4 class="text-uppercase mb-3">{{$testimony->person }}</h4>
                                <p>{{$testimony->location }}</p>
                                <a class="text-uppercase fw-bold" href="{{ route('testimony.show', $testimony) }}">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Testimonies End -->

@endsection