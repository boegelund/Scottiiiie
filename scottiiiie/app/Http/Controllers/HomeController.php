<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Image;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
        // $images = User::find(Auth::user()->id)->imageAccess();
        // return $images;
        $images = Image::orderBy('created_at', 'desc')->get();
        return view('home', ['images' => $images]);
    }
}
