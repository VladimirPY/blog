<?php

namespace App\Http\Controllers;

use App\Author, App\Post;
use Illuminate\Http\Request;

class PostsByAuthorController extends Controller
{
    public function __invoke($key)
    {

        $author = Author::where('key', '=', $key)->first();
        $posts = Post::where( 'author_id', '=', $author->id );
        return view('posts_by_author', ['posts' => $posts->paginate(10), 'author' => $author]);

    }
}
