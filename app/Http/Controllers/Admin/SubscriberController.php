<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;
use App\BreakingNews;
use App\Post;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.index',compact('subscribers'));
    }

    public function deleteSubscriberFunction($subscriber){
        $subscriber = Subscriber::find($subscriber);
        $subscriber->delete();
        return redirect(route('admin.subscriber.index'))->with('success','Subscriber Deleted Successfully');
    }


    public function storeBreakingNewsFromNews($postId){
        $post = Post::find($postId);
        $postTitle = $post->title;

        $bn = new BreakingNews();
        $bn->breakingNews = $postTitle;
        $bn->save();

       // dd($postId);
       return redirect(route('admin.breakingNews.index'))->with('success', 'breakingsnews Inserted Successfully');
    }
}
