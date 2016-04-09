<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Image;
use App\ImageAccess;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Image::where('user_id', '=', Auth::user()->id)->get();
        
        $images2 = Image::whereHas('imageaccess', function ($query) {
            $query->where('user_id', '=', Auth::user()->id);
        })->get();
        
        $images = $images->merge($images2);
        $images = $images->sortByDesc('id');
        
        return view('home', ['images' => $images]);
    }
}
