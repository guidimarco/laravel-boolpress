<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

use App\Mail\MessageFromWebsite;
use Illuminate\Support\Facades\Mail;

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
        return view('guest.home');
    }

    public function contatti() {
        return view('guest.contatti');
    }

    public function contattiSend(Request $request) {
        // dd($request);
        $input_msg = $request -> all(); // new msg from contatti
        // dd($new_msg);

        $new_msg = new Message();
        // dd($new_msg); // new obj empty

        $new_msg -> fill($input_msg);
        // dd($new_msg); // new obj pieno

        $new_msg -> save();

        Mail::to('commerciale@boolpress.com') -> send(new MessageFromWebsite($new_msg));

        return redirect() -> route('index');
    }
}
