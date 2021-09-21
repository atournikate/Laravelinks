<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    //middleware is a thing, which I don't understand
    public function __construct() {
        $this->middleware(['auth']);
    }



    public function store(Post $post, Request $request) {
        
        //the 'dd' data dump is the Laravel equivalent
        //of the PHP var_dump, and is a good way to test
        //to see if something is working
        // dd($post->likedBy($request->user()));

        //this should provide an error message if someone
        //tries to 'like' something more than once,
        //but ideally it should never come to this,
        //due to the if/else presentation in the
        //index.blade.php
        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }


        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request) {
        //go into the 'user', pluck out the 'likes'... 'where' the 'post_id' matches the post's id... and delete it
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();

    }
}
