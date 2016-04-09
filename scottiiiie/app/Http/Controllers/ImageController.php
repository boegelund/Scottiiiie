<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image as ImageLibrary; 
use App\Image;
use App\ImageAccess;
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
        // Must be owner or have access to access image
        if (!Image::where('id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists() && !ImageAccess::where('user_id', '=', Auth::user()->id)->where('image_id', '=', $id)->exists())
        {
            abort(404);
        }
        return view('image', ['image' => Image::findOrFail($id)]);
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
        
        $file = ImageLibrary::make($request->file('image'));
        
        $image = new Image;
        $image->user_id = Auth::user()->id;
        $image->image_data = $file->encode('jpg', 80);
        $image->save();
        
        return redirect('image/'.$image->id);        
    }
    
    public function addUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'imageid' => 'required',
        ]);
        
        // YOU OWN IMAGE?
        if (!Image::find($request->imageid)->where('user_id', '=', Auth::user()->id)->exists())
        {
            abort(404);
        }
        
        // check preconditions
        $image = Image::find($request->imageid);
        $user = User::where('email', $request->email)->first();
        
        if ($user == null || $image == null) {
            return redirect('image/'.$request->imageid);
        }
        
        if (ImageAccess::where('image_id', '=', $image->id)->where('user_id', '=', $user->id)->exists())
        {
            return redirect('image/'.$request->imageid);
        }
        
        $access = new ImageAccess;
        $access->image_id = $image->id;
        $access->user_id = $user->id;
        $access->save();
        
        return redirect('image/'.$request->imageid);
    }
    
    public function revokeUser($image_id, $user_id)
    {
        // Only owner can call this function
        if (!Image::where('id', '=', $image_id)->where('user_id', '=', Auth::user()->id)->exists())
        {
            abort(404);
        }
        
        $access = ImageAccess::where('image_id', '=', $image_id)->where('user_id', '=', $user_id)->first();
        $access->delete();
        
        return redirect('image/'.$image_id);
    }
    
    public function get($id)
    {
        if ((Image::find($id)->user_id == Auth::user()->id) || (ImageAccess::where('image_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists()))
        {
            return Image::findOrFail($id)->image_data;
        }
        abort(404);
    }
}