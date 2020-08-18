<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\BreakingNews;
use App\Category;

use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->Approved()->take(4)->get();
        $breakingNews=BreakingNews::latest()->get();
        $categories = Category::take(3)->get();
        return view('welcome', compact('categories', 'posts', 'breakingNews'));
    }

    


   
}
