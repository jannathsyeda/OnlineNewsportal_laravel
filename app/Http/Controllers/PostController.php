<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->Approved()->paginate(8);
        return view('posts',compact('posts'));
    }
    
    public function details($slug){
        $post = Post::where('slug', $slug)->Approved()->first();
        $newskey = 'newsportal_' . $post->id;
        if (!Session::has($newskey)) {
            $post->increment('view_count');
            Session::put($newskey,1);
        }
   
       
        return view('post',compact('post'));
    }

    
}
