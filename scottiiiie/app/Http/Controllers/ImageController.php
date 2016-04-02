<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
    public function getUpload()
    {
        return view('images.upload');
        
    }
    
    public function postUpload()
    {
        $image = new Image;
        $image->user_id = Auth::user()->id;
        $image->save();
        return redirect()->route('home');
    }
}
