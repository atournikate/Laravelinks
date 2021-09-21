<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware(['auth'])->only('store', 'destroy');
    }

    public function index() {
        //returns all posts in natural database order, creates a collections
        // $posts = Post::get(); this is not ideal for giant repos
        //the with('user', 'likes')-> section reduces the number of times the
        //database is queried, making it run faster...?????
        //you could return the posts in an order using orderBy('created_at', 'desc') prior to the 'with' statement
        //but in this case, 'latest()' is a shortcut
        $posts = Post::latest()->with('user', 'likes')->paginate(5);


        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    //this function takes in the Post via Root Model Binding
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));
        
        // $request->user()->posts()->create([
        //     'body'=> $request->body
        // ]);
        // auth()->user()->posts()->create();

        return back();
    }

    public function destroy(Post $post) {

        // if (!$post->ownedBy(auth()->user())) {
        //     dd("Nope, you can't delete this post");
        //this is obsolete with the introduction of PostPolicy
        // }

        $this->authorize('delete', $post);

        $post->delete();
        return back();

    }
}
