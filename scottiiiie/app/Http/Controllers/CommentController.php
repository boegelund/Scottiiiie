<?php namespace App\Http\Controllers;
use App\Comment;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CommentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->image_id = $request->input('image_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect('image/'.$comment->image_id);
    }
}