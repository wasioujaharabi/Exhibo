@extends('layouts.app')

@section('content')
    @if(count($profiles)>0)
        @foreach ($profiles as $profile)
          {{-- <div class="well">
            <li class="list-group-item"><h3>{{$user-> name}}</h3></li>
          </div> --}}
          <div class="card text-white bg-dark mb-3" style="max-width: 40rem;" color="#7FFF00">
            <div class="row no-gutters">
              <div class="col-md-3">
                <img src="/storage/photos/{{$profile->dp}}" alt="..." height="150" width="125">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><a href="{{route('profiles.show',$profile->id)}}"><h3>{{$profile->first_name}}</h3></a></h5>
                  
                  <p class="card-text"><small class="text-muted">Created at{{$profile->created_at}}</small></p>
                </div>
              </div>
            </div>
          </div>
         
        @endforeach
    @else
        <p>No users found</p>
    @endif
@endsection 