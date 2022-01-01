@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/rating.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> 
<div class="card bg-dark text-white">
    <img src="/storage/photos/{{$posts->photo}}" class="card-img">
    <div class="card-img-overlay">
      <h5 class="card-title">{{$posts->title}}</h5>
      <p class="card-text">{{$posts->body}}</p>
      <p class="card-text">Last updated {{$posts->created_at}}. Uploaded by {{$posts->owner}}</p>
    </div>
  </div>
  <hr>
  <div>
    <a href="{{route('downloadfile',$posts->id)}}" class="btn btn-default" style="background: #f05c07; color: #070106; padding: 12px; display: block; text-decoration: none;">Download this photo</a>
  </div>
  
  @if(Auth::user()->id== $posts->user_id)
      <a href="/posts/{{$posts->id}}/edit" class="btn btn-default">Edit</a>
      {!!Form::open(['action' => ['PostsController@destroy', $posts->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
          {{Form::hidden('_method', 'DELETE')}}
          {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
      {!!Form::close()!!}
  @endif

  <hr>
  <link rel="stylesheet" href="{{ asset('css/rating.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <div class="container container1">
      
        <form action="{{ route('post.review.store',$posts->id) }}" method="POST">
            @csrf
        
            <header></header>
                    <div class="form-group" style="padding:20px">
                        {{Form::label('comment', 'Comments')}}
                        {{Form::textarea('comment', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Thoughts'])}}
                    </div>
                
                <button type="submit" class="btn btn-lg float-right btn-success mt-4">Submit</button>
            </form>
        </div>
        <div class="row">
            @foreach ($reviews as $review )
            <div class="col-sm-7">
				<hr/>
				<div class="review-block">
					<div class="row">
						<div class="col-sm-3">
							<div class="review-block-name"><a href="#">{{ $review->username }}</a></div>
                            <div class="review-block-title"><h4>{{ $review->comment }}</h4></div>
							<div class="review-block-date" color="#7FFF00"><small>{{ $review->updated_at }}</small></div>
						</div>
						
							</div>
                            @if ($review->user_id==Auth::id())
                            <a href="{{ $posts->id}}" class="btn btn-sm float-right btn-warning mt-4"> Edit </a>
                            <a href="{{ $review->id}}" class="btn btn-sm float-right mr-2 btn-danger mt-4"> Delete </a>
                            @endif
                            
							
						</div>
					</div>
					<hr/>
				</div>
			</div>
            @endforeach

		</div>
		
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


    


@endsection
