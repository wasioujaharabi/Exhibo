@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach ($posts as $post) 
            <div class="card" style="width: 50rem;">
                <a href="/posts/{{$post-> id}}"><img src="/storage/photos/{{$post->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">{{$post->title}}</p>
                <p class="card-text">Last updated {{$post->created_at}}. Uploaded by {{$post->owner}}</p>
                </div>
            </div>  
            
        @endforeach
    @else
        <p>No posts found</p>
    @endif
@endsection