<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'this_user' => Auth::user()
        ];
        return view('admin.home', $data);
    }

    public function getToken() {
        $new_token = Str::random(80); // generate random token

        // get current user -> assign new token
        $user = Auth::user();
        $user -> api_token = $new_token;

        $user -> save();

        return redirect() -> route('admin.index');   
    }
}
