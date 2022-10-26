@extends('admin.layout')
@section('title','Dashboard | Categories')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <a class="btn btn-info btn-sm" href="{{ route('category.create') }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            ADD NEW CATEGORY
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
                                        <th>Description</th>
                                        <th style="width: 40px">Date</th>
                                        <th style="width: 40px">status</th>
                                        <th style="width: 40px">Edit</th>
                                        <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category }}</td>
                                        <td>{{ $category->cat_description }}</td>
                                        <td>{{ $category->date }}</td>
                                        <td>
                                            @if($category->status == 1) 
                                                <a class="btn btn-success btn-sm" href="{{ route('category.show', $category) }}">
                                                    Activated
                                                </a>
                                            @else
                                                <a class="btn btn-success btn-sm" href="{{ route('category.show', $category) }}">
                                                    Deactivated
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-sm">
                                                <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </span>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('category.destroy', $category) }}">
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
                                                {{ __('No Category found') }}
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
