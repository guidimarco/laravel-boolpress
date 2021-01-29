<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use App\Category;

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

    public function indexForCategory($category) {
        // dd($category);
        $this_category = Category::where('slug', $category) -> first();
        // dd($this_category -> id);

        $this_category_posts = Post::where('category_id', $this_category -> id) -> get();
        // dd($this_category_posts);

        $data = [
            'this_category' => $this_category,
            'posts' => $this_category_posts
        ];
        return view('guest.posts.indexForCategory', $data);
    }

    public function indexForTag() {
        return 'ciao';
    }
}
