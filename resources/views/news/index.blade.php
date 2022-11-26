@extends('admin.layout')
@section('title','Dashboard | News')
@section('content')

  <!-- Info contents -->
  <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <a class="btn btn-info btn-sm" href="{{ route('news.create') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            ADD FEATURED NEWS
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
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Image</th>
                                        <th>Image Description</th>
                                        <th>Description</th>
                                        <th style="width: 40px">Date</th>
                                        @if(auth()->user()->role == 1)
                                            <th style="width: 40px">status</th>
                                        @endif    
                                        <th style="width: 40px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($news as $news)
                                            <tr>
                                            <td>{{ $news->id }}</td>
                                            <td>{{ $news->title }}</td>
                                            <td>{{ $news->writer->name }}</td>
                                            <td><img src="{{ asset('storage/News_Images')}}/{{$news->image }}" style="max-width: 100px" /></td>
                                            <td>{{ $news->image_description }}</td>
                                            <td><a class="btn btn-primary btn-sm" href="{{ route('news.show', $news) }}">
                                                <i class="fas fa-folder"></i>
                                                    View
                                                </a>
                                            </td>
                                            <td>{{ $news->date }}</td>
                                            @if(auth()->user()->role == 1)
                                                <td>
                                                    @if($news->status == 1) 
                                                        <a class="btn btn-success btn-sm" href="{{ route('news.activate', $news) }}">
                                                            Activated
                                                        </a>
                                                    @else
                                                        <a class="btn btn-success btn-sm" href="{{ route('news.activate', $news) }}">
                                                            Deactivated
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                            <td>
                                                <span class="badge bg-sm">
                                                    <a class="btn btn-info btn-sm" href="{{ route('news.edit', $news) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                </span>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('news.destroy', $news) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-info btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td> 
                                        @empty
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td colspan="2"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    {{ __('No News found') }}
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