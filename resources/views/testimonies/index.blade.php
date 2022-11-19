@extends('admin.layout')
@section('title','Dashboard | Testimony')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="btn btn-info btn-sm">
                        TESTIMONIES
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
                                            <th>Person</th>
                                            <th>Location</th>
                                            <th>Testimony</th>
                                            <th>Photo</th>
                                            <th>Date</th>
                                            <th style="width: 40px">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($testimonies as $testimony)
                                            <tr>
                                                <td>{{ $testimony->id }}</td>
                                                <td>{{ $testimony->person }}</td>
                                                <td>{{ $testimony->location }}</td>
                                                <td>{{ $testimony->testimony}}</td>
                                                <td><img src="{{ asset('storage/Testimony_Images')}}/{{$testimony->photo }}" style="max-width: 100px" /></td>
                                                <td>{{ $testimony->date_created }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('testimony.destroy', $testimony) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-info btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td colspan="2"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                    {{ __('No Testimony found') }}
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
