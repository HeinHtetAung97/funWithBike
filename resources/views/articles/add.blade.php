@extends('layouts.app')
@section('content')
<div class="container" style="max-width: 800px">
   @if ($errors->any())
        <div class=" alert alert-warning">
            <ol>
                @foreach ($errors->all() as $error )
                    <li>{{ $error}}</li>
                @endforeach
            </ol>
        </div>
   @endif
    <div class="card my-5">
        <div class="card-body">
            <h3 class="my-3 text-center">Create Bike </h3>
            <form method="POST">
                @csrf
                <label for="title" class=" form-label">Title</label>
                <input type="text" name="title" class="form-control mb-2">
                <label for="body" class=" form-label">Body</label>
                <textarea name="body" class=" form-control mb-2"></textarea>
                <label for="category">Category</label>
                <select name="category_id" class=" form-select mb-3">
                    @foreach ($categories as $category )
                        <option value="{{ $category->id}}"> {{$category->name}}</option>
                    @endforeach
                </select>
                <button class=" btn btn-primary my-3">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
