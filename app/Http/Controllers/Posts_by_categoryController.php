<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Posts_by_categoryController extends Controller
{
    public function __invoke($key)
    {

        $post = Category::where('key', '=', $key)->first();
        return view('posts_by_category', ['post' => $post]);

    }
}
