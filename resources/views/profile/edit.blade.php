@extends('admin.layout')
@section('title','Dashboard | Edit User')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Update {{ $edituser->name}} Details</h3>
    </div>

    <form method="POST" action="{{ route('user.update', $edituser->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="image1">Edit Image</label><br>
                <img id="blahss" alt="" width="100" height="100" required/>
                <input class="form-control" id="image" type="file" name="image" 
                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])" required/>
            </div>

            <div class="card-body">
                <label for="article_description">Update Role</label>
                <select id="role_id" name="role_id" class="form-control" required>
                    <option value="">Select Role</option>
                        <option value="1">Administrator</option>
                        <option value="2">Author</option>
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

@endsection