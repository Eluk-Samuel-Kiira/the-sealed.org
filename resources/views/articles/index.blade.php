@extends('admin.layout')
@section('title','Dashboard | Articles')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <a class="btn btn-info btn-sm" href="{{ route('article.create') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            ADD NEW ARTICLE
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
                                        <th>Image1</th>
                                        <th>Description</th>
                                        <th>Image2</th>
                                        <th style="width: 40px">Date</th>
                                        @if(auth()->user()->role == 1)
                                            <th style="width: 40px">status</th>
                                        @endif    
                                        <th style="width: 40px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($articles as $article)
                                            @if($article->articles->status == 1)
                                                <tr>
                                                <td>{{ $article->id }}</td>
                                                <td>{{ $article->articles->category }}</td>
                                                <td>{{ $article->authors->name }}</td>
                                                <td>{{ $article->title }}</td>
                                                <td><img src="{{ asset('storage/Article_Images')}}/{{$article->image1 }}" style="max-width: 100px" /></td>
                                                <td><a class="btn btn-primary btn-sm" href="{{ route('article.show', $article) }}">
                                                    <i class="fas fa-folder"></i>
                                                        View
                                                    </a>
                                                </td>
                                                <td><img src="{{ asset('storage/Article_Images')}}/{{$article->image2 }}" style="max-width: 100px" /></td>
                                                <td>{{ $article->date }}</td>
                                                @if(auth()->user()->role == 1)
                                                    <td>
                                                        @if($article->status == 1) 
                                                            <a class="btn btn-success btn-sm" href="{{ route('article.activate', $article) }}">
                                                                Activated
                                                            </a>
                                                        @else
                                                            <a class="btn btn-success btn-sm" href="{{ route('article.activate', $article) }}">
                                                                Deactivated
                                                            </a>
                                                        @endif
                                                    </td>
                                                @endif
                                                <td>
                                                    <span class="badge bg-sm">
                                                        <a class="btn btn-info btn-sm" href="{{ route('article.edit', $article) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </a>
                                                    </span>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('article.destroy', $article) }}">
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
                                                    {{ __('No Article found') }}
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
