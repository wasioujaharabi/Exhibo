@extends('layouts.app');
@section('content')
    

    <div class="container container1">
      
        <form action="{{ route('post.review.store',$post_id) }}" method="POST">
            @csrf
                <div class="textarea">
                    <textarea cols="30" id="comment" name="comment" placeholder="Describe your experience.."></textarea>
                    <!-- Due to more textarea tags I got a problem So I've changed the textarea tag to textare. Please correct it. -->

                    <br />

                </div>
                <button type="submit" class="btn btn-lg float-right btn-success mt-4">Submit</button>
            </form>
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