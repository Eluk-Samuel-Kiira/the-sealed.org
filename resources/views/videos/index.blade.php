@extends('admin.layout')
@section('title','Dashboard | Videos')
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
                                        @forelse($videos_post as $video)
                                            @if($video->videos->status == 1)
                                                <tr>
                                                <td>{{ $video->id }}</td>
                                                <td>{{ $video->videos->category }}</td>
                                                <td>{{ $video->authorz->name }}</td>
                                                <td>{{ $video->title }}</td>
                                                <td><a class="btn btn-primary btn-sm" href="{{ route('video.show', $video) }}">
                                                    <i class="fas fa-folder"></i>
                                                        View
                                                    </a>
                                                </td>
                                                <td>{{ $video->date }}</td>
                                                <td>
                                                    @if($video->status == 1) 
                                                        <a class="btn btn-success btn-sm" href="{{ route('video.activate', $video) }}">
                                                            Activated
                                                        </a>
                                                    @else
                                                        <a class="btn btn-success btn-sm" href="{{ route('video.activate', $video) }}">
                                                            Deactivated
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('video.destroy', $video) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-info btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @else
                                            @endif    
                                        @empty
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td colspan="2"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    {{ __('No Video found') }}
                                                </td>
                                            </tr>
                                        @endforelse
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
