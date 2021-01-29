<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $data = [
            'posts' => Post::all()
        ];

        return view('guest.posts.index', $data);
    }

    public function show($category_slug, $post_slug) {
        // dd($post_slug);
        // dd($category_slug);
        $this_post = Post::where('slug', $post_slug) -> first();
        // dd($this_post);
        $data = [
            'post' => $this_post
        ];
        return view('guest.posts.show', $data);
    }
}
