<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Review;
use App\User;
use App\Post;

class ReviewController extends Controller
{
    public function store(Request $request,$post_id){
        $this -> validate($request,[
            'comment'=>'required',
        ]);
        $review=Review::all()->where('post_id',$post_id)->where('user_id',Auth::id());
        if(count($review)<1){
            $user=User::find(Auth::id());
            $post= Post::find($post_id);
            if($post->user_id==Auth::id()){
                return "UnAuthorized";
            }
            else{
                $review = new Review;
                $review->comment=$request->input('comment');
                $review->post_id=$post->id;
                $review->user_id=Auth::id();
                $review->username=$user->name;
                $review->save();
                return redirect()->route('posts.show',$post_id);
            }
    }
    }


    public function update(Request $request,$post_id,$review_id){
        $this -> validate($request,[
            'comment'=>'required',
            'rate'=>'required',
        ]);
        $post= post::find($post_id);
        $user=User::find(Auth::id());
        if($post->user_id==Auth::id()){
            return "UnAuthorized";
        }
        else{
            $review = Review::find($review_id);
            if($review->user_id == Auth::id()){
                $review->comment=$request->input('comment');
                $review->rate=$request->input('rate');
                $review->post_id=$post->id;
                $review->user_id=Auth::id();
                $review->username=$user->name;
                $review->save();
                return redirect()->route('posts.show',$post_id);
            }
            else{
                return 'UnAuthorized';
            }

        }

    }


    public function delete($id){
        $review = Review::find($id);
        $post_id=$review->post_id;
        if($review->user_id == Auth::id()){
            $review->delete();
            return redirect()->route('posts.show',$post_id);
        }
    }

    public function reviewInfor($id){
        $review = Review::find($id);
        return $review;

    }
}
