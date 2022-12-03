@extends('layouts.landingpage')
@section('title','THE SEALED | Christian Media')
@section('content')

    <!-- Latest Start -->
    <div class="container-fluid bg-light py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4">Latest <span class="text-warning">Articles</span></h1>
        </div>
        <div class="row g-5">
            @foreach ($articles as $article)
                @if($article->articles->status == 1)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                            <img class="img-fluid" src="{{ asset('storage/Article_Images')}}/{{$article->image1 }}" style="max-width: 300px" alt="">
                            <div class="px-4 pb-4">
                                <h4 class="text-uppercase mb-3">{{ $article->title }}</h4>
                                <a class="text-uppercase fw-bold" href="{{ route('description.more', $article) }}">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Latest End -->

    <!-- Testimony Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h1 class="display-5 text-uppercase mb-4">Send us your <span class="text-warning">Testimony</span></h1>
                </div>
                <p class="mb-5">
                    As it is a custom for people to fine motivation for doing certain things or 
                    believing and practicing a cause. Be encouraged with these great and insightful
                    Christian Testimonies of how God can just turn one's life around from troubles and sorrow<br>
                    Share you Testimony with our community, it can touch someone who might have lost all hope.
                </p>
                <a class="btn btn-primary py-3 px-5" href="{{ route('testimony.view') }}">View Testimonies</a>
            </div>
            <div class="col-lg-8">
                <div class="bg-light text-center p-5">
                    @if(session('status'))
                        <div class="alert alert-success">
                                {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('testimony.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="person" class="form-control border-0" placeholder="Your Name" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" name="location" class="form-control border-0" placeholder="Your Location" style="height: 55px;" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="photo">Share A Photo</label><br>
                                <img id="blah" alt="" width="100" height="100" />
                                <input class="form-control" id="photo" type="file" name="photo" 
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
                            </div>
                            <div class="col-12">
                                <textarea name="testimony" class="form-control border-0" rows="5" placeholder="Testimony" required></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit Testimony</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimony End -->

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 text-uppercase mb-4"><span class="text-warning">News & Features</span></h1>
        </div>
        <div class="row g-5">
            @foreach ($news as $news)
                <div class="col-lg-4 col-md-6">
                    <div class="bg-light">
                        <img class="img-fluid" src="{{ asset('storage/News_Images')}}/{{$news->image }}" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-2" src="img/user.jpg" width="35" height="35" alt="">
                                    <span>{{ $news->writer->name }}</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $news->date }}</span>
                                </div>
                            </div>
                            <h4 class="text-uppercase mb-3">{{ $news->title }}</h4>
                            <a class="text-uppercase fw-bold" href="{{ route('news.details', $news) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>  
            @endforeach
        </div>
    </div>
    <!-- Blog End -->

@endsection

