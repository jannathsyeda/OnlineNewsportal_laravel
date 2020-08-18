<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BreakingNews;

class BreakingNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $breakingNews = BreakingNews::latest()->paginate(8);
        return view('admin.breakingNews.index',compact('breakingNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.breakingNews.create');
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
            'breakingNews' => 'required'
           ]);

            $News = new BreakingNews();
            $News->breakingNews = $request->breakingNews;
           
            $News->save();
            return redirect(route('admin.breakingNews.index'))->with('success', 'breakingsnews Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.breakingNews.edit', ['News' => BreakingNews::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'breakingNews' => 'required'
           ]);
   
          
        $News = BreakingNews::find($id); 
        $News->breakingNews = $request->breakingNews;
        
        $News->save();
         return redirect(route('admin.breakingNews.index'))->with('success', 'breakingNews Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $breakingNews = BreakingNews::find($id);
        $breakingNews->delete();
         return redirect(route('admin.breakingNews.index'))->with('success', 'breakingsNews Deleted Successfully');
    }
}
