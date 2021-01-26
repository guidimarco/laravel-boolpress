<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::all() -> take(5)
        ];

        return view('guest.posts', $data);
    }
}
