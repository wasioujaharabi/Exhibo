@extends('layouts.app');
@section('content')
    <link rel="stylesheet" href="{{ asset('css/rating.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <div class="container container1">
        @foreach ($review as $review)
        <form action="{{ route('house.review.update',['house_id'=>$post_id,'review_id'=>$review->id]) }}" method="POST">
            @csrf
        <div class="star-widget">

            @if ($review->rate==5)
            <input type="radio" checked value="5"  name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>
            @else
            <input type="radio" value="5"  name="rate" id="rate-5">
            <label for="rate-5" class="fas fa-star"></label>
            @endif

            @if ($review->rate==4)
            <input type="radio" checked value="4"  name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>
            @else
            <input type="radio" value="4"  name="rate" id="rate-4">
            <label for="rate-4" class="fas fa-star"></label>
            @endif


            @if ($review->rate==3)
            <input type="radio" checked value="3"  name="rate" id="rate-3">
            <label for="rate-3" class="fas fa-star"></label>
            @else
            <input type="radio" value="3"  name="rate" id="rate-3">
            <label for="rate-3" class="fas fa-star"></label>
            @endif

            @if ($review->rate==2)
            <input type="radio" checked value="2"  name="rate" id="rate-2">
            <label for="rate-2" class="fas fa-star"></label>
            @else
            <input type="radio" value="2"  name="rate" id="rate-2">
            <label for="rate-2" class="fas fa-star"></label>
            @endif


            @if ($review->rate==1)
            <input type="radio" checked value="1" name="rate" id="rate-1">
            <label for="rate-1" class="fas fa-star"></label>
            @else
            <input type="radio" value="1" name="rate" id="rate-1">
            <label for="rate-1" class="fas fa-star"></label>
            @endif

            
            
            
            
            
            <header></header>
                <div class="textarea">
                    <textarea cols="30" id="comment" name="comment" >{{ $review->comment }}</textarea>
                    <!-- Due to more textarea tags I got a problem So I've changed the textarea tag to textare. Please correct it. -->

                    <br />

                </div>
                <button type="submit" class="btn btn-lg float-right btn-success mt-4">Submit</button>
            </form>
       
        @endforeach

    </div>

    {{-- <script>
        const btn = document.querySelector("button");
        const post = document.querySelector(".post");
        const widget = document.querySelector(".star-widget");
        const editBtn = document.querySelector(".edit");
        btn.onclick = () => {
            widget.style.display = "none";
            post.style.display = "block";
            editBtn.onclick = () => {
                widget.style.display = "block";
                post.style.display = "none";
            }
            return false;
        }
    </script> --}}


@endsection