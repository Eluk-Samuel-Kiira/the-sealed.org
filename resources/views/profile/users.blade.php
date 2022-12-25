@extends('admin.layout')
@section('title','Dashboard | Users')
@section('content')

    <!-- Info contents -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="badge bg-sm">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Users
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
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Photo</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @forelse ($user as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                        @if($user->role == 1) 
                                                            Administrator
                                                        @else
                                                            Author
                                                        @endif
                                                </td>
                                                <td><img src="{{ asset('storage/Profile_Images')}}/{{$user->photo }}" style="max-width: 100px" /></td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>
                                                    <span class="badge bg-sm">
                                                        <a class="btn btn-info btn-sm" href="{{ route('edit.users', $user->id) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </a>
                                                    </span>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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
                                                    {{ __('No News found') }}
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tr>
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
