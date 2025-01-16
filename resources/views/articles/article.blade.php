@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12  mt-5 row">
        @if (session('delete'))
            <div class="alert alert-warning">
                {{ session('delete')}}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error')}}
            </div>
        @endif
        
        @foreach ($articles as $article )
        <div class="col-4 mb-3">
            <div class="card text-white bg-warning p-2 shadow-sm" style="height: 300px">
                <div class="card-body overflow-hidden">
                    <h3 class=" card-title">{{ $article->title}}</h3>
                    <div class=" text-white-50 mb-4">
                        Category: <b>{{$article->category->name}}</b>
                        {{ $article->created_at->diffForHumans()}}
                    </div>
                    <div class=" text-white mb-4 fs-5 ">{{ $article->body}}</div>
                </div>
                <a href="{{ url("articles/detail/$article->id")}}" class=" card-link fs-5 text-decoration-none ms-3 p-1">View more &raquo;</a>

            </div>
        </div>
        @endforeach

        <div class="mb-5">
            {{ $articles->links()}}
        </div>
    </div>
</div>
@endsection
