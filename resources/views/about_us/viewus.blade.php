@extends('layouts.landingpage')
@section('title','THE SEALED | Our Cronicles')
@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Our Chronicles</h1>
    </div>
    <!-- Page Header Start -->


    <!-- About Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            @foreach($about as $about)
                <div class="col-lg-7">
                    <h1 class="display-6 text-uppercase mb-4">We are <span style="color:#C39B14;">committed</span> to reach out to the ends of the earth</h1>
                    <h4 class="text-uppercase mb-3 text-body">Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum tempor sit diam amet diam et eos labore</h4>
                    <p>{{ $about->description }}</p>
                </div>
                <div class="col-lg-5 pb-5" style="min-height: 400px;">
                    <div class="position-relative bg-dark-radial h-100 ms-5">
                        <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="{{ asset('storage/About_Images')}}/{{$about->photo }}" style="object-fit: cover;">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">We Are a <span style="color:#C39B14;">Team of Committed</span> Servants.</h1>
        </div>
        <div class="row g-5">
            @foreach($members as $member)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="{{ asset('storage/Profile_Images')}}/{{$member->photo }}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                                <a class="btn" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn" href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light p-4">
                                <h4 class="text-uppercase">{{ $member->name }}</h4>
                                @if($member->role == 1)
                                    <span>Administrator</span>
                                @else
                                    <span>Author</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Team End -->

@endsection

