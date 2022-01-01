<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Review;
use Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'index']);
    }

    public function index()
    {
        $post = Post::orderBy('created_at','desc')->get();
        return view('posts.index')-> with('posts',$post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title'=> 'required',
            'body'=> 'required',
            'photo'=> 'image|max:1999'
        ]);
        if($request->hasFile('photo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/photos', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //post creation\
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->owner = auth()->user()->name;
        $post->user_id = auth()->user()->id;
        $post->photo = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $reviews =Review::where('post_id',$id)->get();
       
        return view('posts.show',['posts'=>$post,'reviews'=>$reviews]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'body'=> 'required',
            
        ]);
        //post creation\
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->owner = auth()->user()->name;
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts');
        }
        $post -> delete();
        return redirect('/posts')->with('success', 'Post removed');
    }

    public function Review($id){
        $review=Review::where('post_id',$id)->where('user_id',Auth::id())->get();
        if(count($review)<1){
            return view('addreview',['post_id'=>$id]);
        }
        else{
            // return $review[1];
            return view('EditReview',['post_id'=>$id,'review'=>$review]);
        }
    }
    public function download($id){
        $file= Post::find($id);
        return response()->download(storage_path('app\public\photos\\'. $file->photo));
     }
}
