@extends('admin.layout')
@section('title','Dashboard | Video')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <a class="btn btn-info btn-sm" href="{{ route('video.create') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            ADD NEW VIDEO
                        </a>
                    </span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">   
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th>Video</th>
                                        <th style="width: 40px">Date</th>
                                            <th style="width: 40px">status</th>
                                        <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end contents -->
    
@endsection
