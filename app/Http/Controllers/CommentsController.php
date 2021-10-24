<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Comment;
use App\User;
use App\Post;

class CommentsController extends Controller
{

    public function store(CommentRequest $request)
    {

        $comment = new Comment;

        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('index');
    }

}
