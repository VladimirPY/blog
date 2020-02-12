<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, \App\Post;

class SinglePostController extends Controller
{
    public function __invoke($id)
    {
        $post = Post::where ('id', '=',  $id)->first();
        return view('single_post', ['post' => $post] );
    }
}
