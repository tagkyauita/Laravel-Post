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

    public function store(StorePost $request) {
        
        $post = new Post;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->text = $request->body;
        $post->save();

        return redirect()->route('index');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(StorePost $request, $id) {
        $post = Post::findOrFail($id);
        
        if(Auth::id() == $post->user_id){
            $post->title = $request->title;
            $post->text = $request->body;
            $post->save();

            return redirect()->route('index');
        }
        return back()->with('error', '許可されていない操作です');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        if(Auth::id() == $post->user_id){
            $post -> delete();
        }
        
        return back()->with('error', '許可されていない操作です');;
    }
}


