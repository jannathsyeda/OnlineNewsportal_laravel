<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers',
        ]);

        $s = new Subscriber();
        $s->email = $request->email;
        $s->save();

        return redirect(route('mainhome'))->with('successSubscriber', 'Subscriber Added Successfully');
    }
}
