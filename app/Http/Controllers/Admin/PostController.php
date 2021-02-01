<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDATE
        $request -> validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ]);

        // SAVE NEW POST
        $post_input = $request -> all();
        // dd($post_input);

        $new_post = new Post();
        $new_post -> fill($post_input);

        //generate slug and check
        // 1) get slug base
        $base_slug = Str::slug($new_post -> title, '-');
        $slug = $base_slug;
        // 2) sentinel var
        $already_slug = Post::where('slug', $slug) -> first(); // return collection if there is, NULL otherwise
        $contatore = 1; // contatore
        // 3) check while there's not same-slug
        while ($already_slug) {
            $slug = $base_slug . '-' . $contatore;
            $contatore++;
            $already_slug = Post::where('slug', $slug) -> first();
        }
        // 4) assign to class
        $new_post -> slug = $slug;

        $new_post -> save();

        $new_post -> tags() -> sync($post_input['tags']);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post) {
            $data = [
                'post' => $post
            ];
            return view('admin.posts.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post) {
            $data = [
                'post' => $post,
                'categories' => Category::all(),
                'tags' => Tag::all()
            ];
            return view('admin.posts.edit', $data);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post_input_edit = $request -> all();
        // $original_post = Post::find($id);
        // dd($post_input_edit);

        // if title change -> generate new $slug
        // dd($post_input_edit['title'] != $post -> title); -> true
        if ($post_input_edit['title'] != $post -> title) {
            //generate slug and check
            // 1) get slug base
            $base_slug = Str::slug($post_input_edit['title'], '-');
            $slug = $base_slug;
            // 2) sentinel var
            $already_slug = Post::where('slug', $slug) -> first(); // return collection if there is, NULL otherwise
            $contatore = 1; // contatore
            // 3) check while there's not same-slug
            while ($already_slug) {
                $slug = $base_slug . '-' . $contatore;
                $contatore++;
                $already_slug = Post::where('slug', $slug) -> first();
            }
            // 4) assign to class
            $post_input_edit['slug'] = $slug;
            // dd($slug);
            $post -> update(['slug' => $slug]);
        }

        $post -> update($post_input_edit);

        // dd($post);

        $post -> tags() -> sync($post_input_edit['tags']);

        return redirect() -> route('admin.posts.show', ['post' => $post -> id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post -> tags() -> sync([]);
        $post -> delete();
        return redirect() -> route('admin.posts.index');
    }
}
