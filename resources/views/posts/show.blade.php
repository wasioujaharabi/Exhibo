@extends('layouts.app')

@section('content')
<div class="card bg-dark text-white">
    <img src="/storage/photos/{{$posts->photo}}" class="card-img">
    <div class="card-img-overlay">
      <h5 class="card-title">{{$posts->title}}</h5>
      <p class="card-text">{{$posts->body}}</p>
      <p class="card-text">Last updated {{$posts->created_at}}. Uploaded by {{$posts->owner}}</p>
    </div>
  </div>
  @if(Auth::user()->id== $posts->user_id)
      <a href="/posts/{{$posts->id}}/edit" class="btn btn-default">Edit</a>
      {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
      {!!Form::close()!!}
  @endif
@endsection