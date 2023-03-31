<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index',(compact('posts')));
    }

    public function show(Post $post){
        return view('posts.show', compact('post'));
    }

    public function store(StorePost $request){
        $post = Post::create([
            'title' =>  $request->title,
            'body'  =>  $request->body,
            'user_id' =>  Auth::user()->id

        ]);
        return redirect(route('posts.index'));
    }

    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }

    public function update(Post $post, Request $request){
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route('posts.show',$post));
    }

    public function create(){
        return view('posts.create');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect(route('posts.index'));
    }

}
