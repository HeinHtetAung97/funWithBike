@extends('layouts.app')
@section('content')
    <div class="container mb-5" style="max-width: 600px">
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error')}}
            </div>
        @endif
        <div class="card shadow-sm">
            <h2 class="text-center my-3 text-warning">Detail Bike</h2>
            <div class="card-body">
                <h3 class=" card-title">{{ $article->title}}</h3>
                <div class=" mb-4 small">
                    <b>{{$article->user->name}} :</b>
                    <b>Category:{{ $article->category->name}}</b>
                    {{ $article->created_at->diffForhumans()}}
                </div>
                <p class=" text-muted mb-4">{{ $article->body}}</p>
                @auth
                    <div class=" mb-3">
                        <a href="{{ url("article/edit/$article->id")}}" class=" btn btn-outline-warning">Edit</a>
                        <a href="{{ url("article/delete/$article->id")}}" class=" btn btn-outline-danger">Delete</a>
                    </div>
                @endauth
            </div>
        </div>
        <ul class="list-group">
            <li class=" list-group-item active">Comments ({{ $article->comments->count()}})</li>
            @foreach ($article->comments as $comment )
            <li class="list-group-item">
                <a href=" {{ url("comment/delete/$comment->id")}}" class=" btn-close float-end "></a>
                {{ $comment->content}}
                <div class=" small text-muted">
                    <b>By {{ $comment->user->name}}</b>
                    <span>{{ $comment->created_at->diffForHumans()}}</span>
                </div>
            </li>
            @endforeach
            <form action="{{ url('comment/add')}}" method="POST">
                @csrf
                <input type="hidden" value="{{ $article->id}}" name="article_id">
                <textarea name="content" class=" form-control" rows="2" placeholder="Comment..."></textarea>
                <button class="btn btn-outline-primary mt-2">Post</button>
            </form>
        </ul>

    </div>
@endsection
