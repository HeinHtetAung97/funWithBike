<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function comments ()
    {
        $comment = Comment::all();
        return view('articles.detail', [
            'comments' => $comment
        ]);
    }

    public function add ()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->user_id = Auth::id();
        $comment->article_id = request()->article_id;
        $comment->save();

        return back();
    }

    public function delete ($id){
        $comment = Comment::find($id);
        if(Gate::allows('comment-delete', $comment)){
            $comment->delete();
            return back();
        }else{
            return back()->with('error', 'Unauthorize');
        }
    }

    
}
