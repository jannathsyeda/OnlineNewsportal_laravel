<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;


class SearchController extends Controller
{
    public function search(Request $request)
    {
      $date = $request->get('date');
      $posts = Post::whereDate('created_at', '=', $date)->paginate(8);
      return view('search',compact('posts'));
    }
}
