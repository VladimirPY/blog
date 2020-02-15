<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(){
        $categories = \App\Category::all();
        return view('views.layouts.categories', ['categories' => $categories]);
    }
    
}
