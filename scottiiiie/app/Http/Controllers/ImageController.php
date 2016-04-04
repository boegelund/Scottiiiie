<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\User;
use App\Image;
use App\Http\Controllers\Controller;


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
     * Show the page for the given image.
     *
     * @param  int  $id
     * @return Response
     */
    public function showImage($id)
    {
        return view('image', ['image' => image::findOrFail($id)]);
    }
    
    public function form()
    {
        return view('upload');
    }
    
    public function submit()
    {
        $image = new Image;
        $image->user_id = Auth::user()->id;
        $image->save();
        return redirect('home');
    }
    
    public function get($id)
    {
        $img = Image::make('foo.jpg');
        return $img->response('jpg');
    }
}