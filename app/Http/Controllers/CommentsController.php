<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentPost;

use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function store(CommentPost $request)
    {
        dd($request);
        $comment = new Comment;
    }
}
