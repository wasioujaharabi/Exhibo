<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Setup Your Gallery', 'Buy photographs', 'Sell Photographs']
        );
        return view('pages.services')->with($data);
    }
    public function photographers(){
        $user = User::orderBy('id','desc')->get();
        $profile = Profile::orderby('first_name','desc')->get();
        return view('pages.photographers')-> with('profiles',$profile);
    }
}
