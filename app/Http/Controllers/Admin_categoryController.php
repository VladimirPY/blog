<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Category;

class Admin_categoryController extends Controller
{
    public function add(Request $request)
    {
        $category = new Category();
        $category->key = $request->input('key');
        $category->categories = $request->input('categories');
        $category->save();
        return back();
    }

    public function save(Request $request)
    {
        $category = Category::find( $request->input( "id" ) );
        $category->key = $request->input( "key" );
        $category->categories = $request->input( "categories" );
        $category->save();
        return back();
    }

    public function delete(Request $request)
    {
            $category_post = DB::table('category_post')->where('category_id','=',$request->input('id'))->delete();
            $category = Category::find($request->input('id'));
            $category->delete();
            return back();
    }
}
