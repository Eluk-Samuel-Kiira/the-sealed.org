@extends('admin.layout')
@section('title','Dashboard | Articles')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Article Details</h3>
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
                        <h4>{{ $article->title }}</h4>
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                <span class="username">
                                    <a href="#">{{ $article->art_id }}</a>
                                </span>
                                <span class="description">{{ $article->art_date }}</span>
                            </div>
                            <p>
                                {{ $article->descriptions }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection