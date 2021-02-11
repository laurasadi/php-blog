<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('blog_themes/pages/add-category');
    }

    public function storeCategory(Request $request)
    {
//        $validateData = $request->validate([
//            'name' => 'required'
//        ]);
////        dd($request);
        Category::create([
            'namecat' => request('namecat')
        ]);
        return redirect('/');
    }

    public function showCategories()
    {   $categories = Category::all();
        return view('blog_themes/pages/all-categories', compact('categories'));
    }
    public function categoryDelete(Category $category){
        $category->delete();
        return redirect('blog_themes/pages/all-categories');
    }

}
