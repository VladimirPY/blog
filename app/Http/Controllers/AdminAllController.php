<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, \App\Category, \App\Post;

class AdminAllController extends Controller
{
    public function all()
    {
        return view('admin.admin');
    }

    public function category(){
        return view('admin.admin_category', ['categories' => Category::all()]);
    }
    public function posts(){
        return view('admin.admin_posts', ['posts' => Post::paginate(10)]);
    }
}
