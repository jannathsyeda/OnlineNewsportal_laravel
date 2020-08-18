<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CatController extends Controller
{
    public function index($id)
    {   
        $category = Category::find($id);
        $posts =  Post::latest()->Approved()->where('category_id', $id)->paginate(8);
        return view('categoryWisePost',compact('posts', 'category'));
    }
}
