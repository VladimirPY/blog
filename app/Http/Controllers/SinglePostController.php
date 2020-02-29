<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, \App\Post, \App\Comment;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where ('id', '=',  $id)->first();
        return view('single_post', ['post' => $post] );
    }

    public function add_comment(Request $request){
        if(  $request->input("text") !== NULL ){
            $comment = new Comment;
            $comment->user_id = $request->input("user_id");
            $comment->post_id = $request->input("post_id");
            $comment->text = $request->input("text");
            $comment->save();
        }
        return back();
    }
}
