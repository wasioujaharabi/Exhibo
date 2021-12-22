@extends('layouts.app')

@section('content')
    @if(count($users)>0)
        @foreach ($users as $user)
          {{-- <div class="well">
            <li class="list-group-item"><h3>{{$user-> name}}</h3></li>
          </div> --}}
          <div class="alert alert-info" role="alert">
            <h3>{{$user-> name}}</h3>
          </div>
        @endforeach
    @else
        <p>No users found</p>
    @endif
@endsection 