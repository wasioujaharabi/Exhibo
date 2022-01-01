<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use App\Post;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $profile_id = auth()->user()->id;
        $user = User::find($profile_id);
        $profile = Profile::all()->where('profile_id',$profile_id)->first();
        
        
        return view('profiles.index',['profile'=> $profile,'posts'=>$user->posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'based_in'=>'required',
            'institute'=>'required',
            'dp'=>'image|1999',
            'insta'=>'required'

            // 'Hobbies'=>'required'
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

        $profile = new Profile;
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->email = $request->input('email');
        $profile->based_in=$request->input('based_in');
        $profile->profession=$request->input('profession');
        $profile->institute=$request->input('institute');
        $profile->insta=$request->input('insta');
        $profile->profile_id=auth()->user()->id;
        $profile->dp=$fileNameToStore;
        
        $profile->save();

        return redirect('/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $profile_id = $id;
        
        
        $profile = Profile::find($id);
        $post = Post::all()->where('user_id',$profile->profile_id);
        // dd($profile);
        
        return view('profiles.index',['profile'=> $profile,'posts'=>$post]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile_id = auth()->user()->id;
        $user = User::find($profile_id);
        $profile = Profile::all()->where('profile_id',$profile_id)->first();
        
        return view('profiles.edit')->with('profile',$profile);
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
        $this->Validate($request,[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email' => 'required',
            'based_in'=>'required',
            'institute'=>'required',
            'dp'=>'image|1999',
            'insta'=>'required'

            // 'Hobbies'=>'required'
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
        }

        $profile = Profile::find($id);
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->email = $request->input('email');
        $profile->based_in=$request->input('based_in');
        $profile->profession=$request->input('profession');
        $profile->institute=$request->input('institute');
        $profile->insta=$request->input('insta');
        $profile->profile_id=auth()->user()->id;
        $profile->dp=$fileNameToStore;
        
        $profile->save();

        return redirect('/profiles');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
