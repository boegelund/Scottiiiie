<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image as ImageLibrary; 
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
    
    public function submit(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|max:10000|mimes:jpg,jpeg'
        ]);
        
        $file = $request->file('image');
        $image = new Image;
        $image->user_id = Auth::user()->id;
        $image->image_data = file_get_contents($file);
        $image->save();
        
        return redirect('home');
    }
    
    public function get($id)
    {
        return Image::findOrFail($id)->image_data;
    }
}