<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_input = $request -> all();
        // dd($category_input);

        $new_category = new Category();
        $new_category -> fill($category_input);

        //generate slug and check
        // 1) get slug base
        $base_slug = Str::slug($new_category -> name, '-');
        $slug = $base_slug;
        // 2) sentinel var
        $already_slug = Category::where('slug', $slug) -> first(); // return collection if there is, NULL otherwise
        $contatore = 1; // contatore
        // 3) check while there's not same-slug
        while ($already_slug) {
            $slug = $base_slug . '-' . $contatore;
            $contatore++;
            $already_slug = Category::where('slug', $slug) -> first();
        }
        // 4) assign to class
        $new_category -> slug = $slug;

        $new_category -> save();

        return redirect() -> route('admin.categories.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
