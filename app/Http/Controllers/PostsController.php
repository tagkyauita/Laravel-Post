<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePost;

use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        
        return view('posts.index',
        [
            'posts' => $posts,
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(StorePost $request, $id) {
        $validated = $request->validated();
        
        $post = new Post;
        $post->user_id = $id;
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        $post->save();

        return redirect()->route('index');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        if(Auth::id() == $post->user_id){
            $post -> delete();
        }
        return back();
    }
}


