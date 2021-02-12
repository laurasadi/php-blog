<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use File;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','showFull']]);
    }

    public function index(){

        $posts = DB::table('posts')
            ->join('categories', 'posts.categoryid', "=", 'categories.id')
            ->join('users', 'posts.user_id', "=", 'users.id')
            ->select('posts.id', 'posts.title','posts.body','posts.created_at','posts.user_id','categories.namecat', 'users.name', 'posts.img')
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
            'categoryid' => 'required',
            'img' => 'mimes:jpeg, jpg, png, gif|required|max:1000'
        ]);
        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/',"",$path);

        Post::create([
            'title' => request('title'),
            'categoryid' => request('categoryid'),
            'body' => request('body'),
            'img' => $filename,
            'user_id' =>Auth::id()
        ]);
        return redirect('/');

    }
    public function showFull(Post $post){
        return view ('blog_themes/pages/post', compact('post'));
    }

    public function edit(Post $post){
        if(Gate::allows('update',$post)){
            return view ('blog_themes/pages/edit', compact('post'));
        }
       dd('klaida');
    }

    public function storeUpdate(Request $request, Post $post){
        if($request->file()) {
            File::delete(storage_path('app/public/', $post->img));
            $path = $request->file('img')->store('public/images');
            $filename = str_replace('public/', "", $path);
            Post::where('id', $post->id)->update(['img' => $filename]);
        }
        Post::where('id', $post->id)->update($request->only(['title', 'category','body']));
        return redirect('/');
    }
    public function delete(Post $post){
        if(Gate::allows('delete',$post))
        $post->delete();
        return redirect('/');
    }

}

