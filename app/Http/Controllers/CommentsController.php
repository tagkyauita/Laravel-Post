<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentPost;
use App\Http\Requests\CommentEdit;

use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function store(CommentPost $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comments[$request->post_id];
        $comment->save();

        return redirect()->route('index'); 
    }

    public function edit($id) {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(CommentEdit $request, $id) {
        $comment = Comment::findOrFail($id);
        
        if(Auth::id() == $comment->user->id){
            $comment->comment = $request->comments;
            $comment->save();

            return redirect()->route('index');
        }
        return redirect()->route('index')->with('error', '許可されていない操作です');
    }

    public function destroy($id) {
        $comment = Comment::findOrFail($id);

        if(Auth::id() == $comment->user->id){
            $comment -> delete();

            return redirect()->route('index');
        }
        
        return redirect()->route('index')->with('error', '許可されていない操作です');
    }
}
