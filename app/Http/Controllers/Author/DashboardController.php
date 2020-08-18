<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // $total_pending_posts = Post::latest()->where('is_approved',false);
         $categories = Category::latest()->get();
         $authors = User::where('role_id', 2)->latest()->get();
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('author.dashboard', compact('posts', 'categories', 'authors'));
    }
}
