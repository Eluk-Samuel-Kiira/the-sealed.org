@extends('admin.layout')
@section('title','Dashboard | Video')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Video Details</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                    <div class="col-12">
                        <h4>{{ $video->title }}</h4>
                        <div class="post">
                            <div center-align>
                                <video width="800" controls>
                                    <source src="{{ asset('storage/Video')}}/{{$video->video }}" type="video/mp4">
                                    <source src="mov_bbb.ogg" type="video/ogg">
                                    Your browser does not support HTML video.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection