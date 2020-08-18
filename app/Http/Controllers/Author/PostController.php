<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->get();
        return view('author.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('author.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category' => 'required',
            'body' => 'required',
  
           ]);
  
     // Get Form Image
          $image = $request->file('image');
          $slug = str_slug($request->title);
          if (isset($image)) {
             
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
          // Check Category Dir is exists
  
              if (!Storage::disk('public')->exists('post')) {
                 Storage::disk('public')->makeDirectory('post');
              }
  
  
              // Resize Image for category and upload
              $postImage = Image::make($image)->resize(1600,1066)->stream();
              Storage::disk('public')->put('post/'.$imageName,$postImage);
  
     }else{
      $imageName = "default.png";
     }
  
    $post = new Post();
    $post->user_id = Auth::id();
    $post->title = $request->title;
    $post->slug = $slug;
    $post->category_id = $request->category;
    $post->image = $imageName;
    $post->body = $request->body;
    $post->is_approved = false;
    $post->save();
    return redirect(route('author.post.index'))->with('success', 'News Inserted Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->user_id != Auth::id()){
            return redirect()->back();
        }
        return view('author.post.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id != Auth::id()){
            return redirect()->back();
        }

        $categories = Category::all();
        return view('author.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if($post->user_id != Auth::id()){
            return redirect()->back();
        }

        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
           ]);

  
        // Get Form Image
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image)) {
             
        // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
        // Check Category Dir is exists
        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }
  
        // Delete old post image
        if(Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
        }
  
        // Resize Image for category and upload
        $postImage = Image::make($image)->resize(1600,1066)->stream();
        Storage::disk('public')->put('post/'.$imageName,$postImage);
  
     }else{

        $ext = pathinfo(public_path().'post/'.$post->image, PATHINFO_EXTENSION);
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$ext;
              
        Storage::disk('public')->rename('post/'.$post->image, 'post/'.$imageName);
        $post->image = $imageName;
     }
  
    
    $post->user_id = Auth::id();
    $post->title = $request->title;
    $post->category_id = $request->category;
    $post->slug = $slug;
    $post->image = $imageName;
    $post->body = $request->body;
    $post->is_approved = false;
    $post->save();


    return redirect(route('author.post.index'))->with('success', 'News Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user_id != Auth::id()){
            return redirect()->back();
        }
        
        if (Storage::disk('public')->exists('post/'.$post->image)) {
            Storage::disk('public')->delete('post/'.$post->image);
         }
         $post->delete();
         return redirect(route('author.post.index'))->with('success', 'Post Deleted Successfully');
    }
}
