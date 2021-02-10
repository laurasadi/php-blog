<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){

        $posts = DB::table('posts')
            ->join('categories', 'posts.categoryid', "=", 'categories.id')
            ->select('posts.id', 'posts.title','posts.body','posts.created_at','categories.name')
            ->paginate(5);

        return view('blog_themes/pages/home', compact('posts'));
    }

    public function addPost(){
        $categories = Category::all();
        return view('blog_themes/pages/add-post', compact('categories'));
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'categoryid' => 'required'
        ]);
//        dd($request);

        Post::create([
            'title' => request('title'),
            'categoryid' => request('categoryid'),
            'body' => request('body'),
        ]);

        return redirect('/');

    }
    public function showFull(Post $post){
        return view ('blog_themes/pages/post', compact('post'));
    }

    public function edit(Post $post){
        return view ('blog_themes/pages/edit', compact('post'));
    }

    public function storeUpdate(Request $request, Post $post){
        Post::where('id', $post->id)->update($request->only(['title', 'category','body']));
        return redirect('/');
    }
    public function delete(Post $post){
        $post->delete();
        return redirect('/');
    }

}

