<?php

namespace App\Http\Controllers;

use App\Category, App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsByCategoryController extends Controller
{
    public function __invoke($key)
    {

        $posts = Category::where('key', '=', $key)->first()->post();
        return view('posts_by_category', ['posts' => $posts->paginate(10)]);

    }
}
