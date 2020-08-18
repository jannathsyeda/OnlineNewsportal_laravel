<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class DashboardController extends Controller
{
    public function index(){
         $total_pending_posts = Post::where('is_approved',false);
         $categories = Category::latest()->get();
         $authors = User::where('role_id', 2)->latest()->get();
        $posts = Post::latest()->get();
        return view('admin.dashboard', compact('posts', 'categories', 'authors', 'total_pending_posts'));
    }
}
