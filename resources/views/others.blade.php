@if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">ADD NEW ARTICLE</h3>
    </div>

    <form method="POST" action="{{ route('article.store') }}">
        @csrf    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="article_category">Article Category</label>
                <select id="category" name="category" class="form-control">
                    <option>Select Category Name</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="article_title">Article Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Article Title">
            </div>

            <div class="form-group">
                <label for="image1">Image 1</label><br>
                <img id="blahss" alt="" width="100" height="100" />
                <input class="form-control" id="image1" type="file" name="image1" 
                    onchange="document.getElementById('blahss').src = window.URL.createObjectURL(this.files[0])"/>
            </div>

            <div class="form-group">
                <label for="image2">Image 2</label><br>
                <img id="blahss" alt="" width="100" height="100" />
                <input class="form-control" id="image2" type="file" name="image2" 
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
            </div>

            <div class="form-group">
                <label for="article_description">Category Description</label>
                <textarea class="form-control" id="cat_description" name="cat_description" placeholder="Enter category description" rows="4" cols="50">
                </textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>

