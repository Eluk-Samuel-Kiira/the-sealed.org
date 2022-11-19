@extends('layouts.landingpage')
@section('title','THE SEALED | Testimonies')
@section('content')
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Testimony Detail Start -->
                <div class="mb-5">
                    <img class="img-fluid w-60 rounded mb-5" src="{{ asset('storage/Testimony_Images')}}/{{$testimony->photo }}" style="max-width: 400px" alt="">
                    <h1 class="text-uppercase mb-4">{{ $testimony->person }}</h1>
                    <p>{{ $testimony->testimony }}</p>
                    <h6>Author: {{ $testimony->location }} <small><i> ---{{ $testimony->date_created }}</i></small></h6>
                </div>
            </div>
        </div>    
    </div>
@endsection