@extends('admin.layout')
@section('title','Dashboard | About Us')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <i class="fas fa-pencil-alt">
                        </i>
                        About Us
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
                                            <th>id</th>    
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($aboutus as $about)
                                        <tr>
                                            <td>{{ $about->id }}</td>
                                                <td><img src="{{ asset('storage/About_Images')}}/{{$about->photo }}" style="max-width: 100px" /></td>
                                            <td>{{ $about->description }}</td>
                                            <td>{{ $about->date }}</td>
                                            <td>
                                                <span class="badge bg-sm">
                                                    <a class="btn btn-info btn-sm" href="{{ route('about.edit', $about->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td colspan="2"
                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ __('No Description found') }}
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
