<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = User::latest()->where('role_id', 2)->paginate(8);
        return view('admin.authors', compact('authors'));
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Author Deleted Successfully');
    }
}
