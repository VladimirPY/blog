<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, \App\Post, \App\Author;
use Illuminate\Support\Facades\DB;

class Admin_postController extends Controller
{
    public function add(Request $request)
    {
        return view('admin.add_post');
    }

    public function save(Request $request)
    {
        if ($request->method() == 'POST') {

            $this->validate($request, [
                'author_name' => 'required|max:100',
                'title' => 'required|max:255|unique:posts,title',
                'body' => 'required|min:10',
                'image' => 'image|mimes:jpeg,jpg,png',
            ]);

            $author = new Author();
            $author->key = $request->input('author_name');
            $author->name = $request->input('author_name');
            $author->save();
            $id = $author->id;

            $post = new Post();
            $post->author_id = $id;
            $post->title = $request->input('title');
            $post->body = $request->input('body');

            $image = $request->image;
            if ($image) {
                $imageName = $image->getClientOriginalName();
                $image->move('images', $imageName);
                $post->img = 'http://blog/images/' . $imageName;
            }
            $post->save();

        }
        return redirect('/post/' . $post->id);
    }

    public function edit($id)
    {
        $post = Post::where('id', '=', $id)->first();

        return view('admin.edit_post', ['post' => $post]);
    }

    public function edit_save(Request $request, $id)
    {
        if ($request->method() == 'POST') {

            $this->validate($request, [
                'title' => 'required|max:255|unique:posts,title',
                'body' => 'required|min:10',
                'image' => 'image|mimes:jpeg,jpg,png',
            ]);

            $post = Post::where('id', '=', $id)->first();
            $post->title = $request->input('title');
            $post->body = $request->input('body');

            $image = $request->image;
            if ($image) {
                $imageName = $image->getClientOriginalName();
                $image->move('images', $imageName);
                $post->img = 'http://blog/images/' . $imageName;
            }
            $post->save();

        }
        return redirect('/post/' . $post->id);
    }

    public function delete(Request $request)
    {
            $category_post = DB::table('category_post')->where('post_id','=',$request->input('id'))->delete();
            $post = Post::find($request->input('id'));
            $post->delete();
            return back();
    }
}
