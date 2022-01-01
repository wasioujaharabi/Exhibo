@extends('layouts.app')

@section('content')
    <h1>Profile</h1>
    
        
            <div class="card border-primary mb-8" >
                <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/storage/photos/{{$profile->dp}}" alt="..." width="350" height="400">
                </div>
                <div class="col-md-8" width="400" height="400">
                    <div class="card-body">
                    <h5 class="card-title">{{$profile->first_name}} {{$profile->last_name}}</h5>
                    <p class="card-text">Email: {{$profile->email}}</p>
                    <p class="card-text">Based in {{$profile->based_in}}</p>
                    <p class="card-text">Works as {{$profile->profession}}</p>
                    <p class="card-text">Studied at {{$profile->institute}}</p>
                    <p class="card-text"><a href="https://www.instagram.com/{{$profile->insta}}">{{$profile->insta}}</a> on Instagram</p>
                    
                    </div>
                    
                    @if(Auth::user()->id== $profile->profile_id)
                    <div><a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-success"> Edit Profile</a></div>
                    @endif
                </div>
                </div>
            </div>

            <hr>
            <div class="alert alert-primary" role="alert">
                Your Posts
              </div>
            @if(count($posts)>0)

                    @foreach($posts as $post)
                        <tr>
                            <div class="card" style="width: 18rem;">
                                <img src="/storage/photos/{{$post->photo}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{$post->title}}</h5>
                                  <p class="card-text">{{$post->body}}</p>
                                  <td><a href="/posts/{{$post->id}}" class="btn btn-primary">Edit</a></td>
                                </div>
                              </div>
                            {{-- <td>{{$post->title}}</td>
                            <td><a href="/posts/{{$post->id}}" class="btn btn-default">Edit</a></td> --}}
                            
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no posts</p>
            @endif
            
            
        {{-- <div class="card">
            <div class="card-header">
            Your Profile
            </div>
            <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p class="card-text">{{$profile->first_name}}</p>
                <p class="card-text">{{$profile->last_name}}</p>
                <p class="card-text">{{$profile->email}}</p>
                <p class="card-text">{{$profile->based_in}}</p>
                <p class="card-text">{{$profile->profession}}</p>
                <p class="card-text">{{$profile->institute}}</p>
                
    
                <footer class="blockquote-footer">by <cite title="Source Title">pirlo</cite></footer>
            </blockquote>
            </div>
        </div>
             --}}
        
     
@endsection