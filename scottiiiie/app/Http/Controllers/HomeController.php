<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('home', ['users' => $users]);
    }
    
    public function uploadForm()
    {
        return view('upload');
    }
    
    public function uploadSubmit()
    {
        $image = new Image;
        $image->user_id = Auth::user()->id;
        $image->save();
        return redirect()->route('home');
    }
    
}
