<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke(){
        return view('index', ['posts' => \App\Post::paginate (10)]);
    }
}
