@extends('layouts.app')
@section('content')
    <div class="container" style="max-width: 700px">
        <div class="card shadow-sm p-2">
            <div class="card-body">
                <h3 class=" card-header mt-4 mb-5 text-center text-warning">Edit Article</h3>
                <form method="POST">
                    @csrf
                    <label for="title" class=" form-label">Title</label>
                    <input type="text" name="title" class=" form-control mb-3" value="{{ $article->title}}">
                    <label for="body" class=" form-label">Body</label>
                    <textarea name="body" class=" form-control mb-3">{{ $article->body}}</textarea>
                    <label for="category_id" class=" form-label">Category</label>
                    <select name="category_id" class=" form-select mb-4">
                        @foreach ($categories as $category )
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                        @endforeach
                    </select>
                    <button class=" btn btn-outline-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
