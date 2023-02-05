<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => [
                    'required',
                    'string',
                    'max:200'
                ],

                'slug' => [
                    'required',
                    'string',
                    'max:200'
                ],

                'description' => [
                    'required'
                ],

                'category_id' => [
                    'required'
                ],

                'status' => [
                    'nullable'
                ],
            ],
            [
                'title.required' => "Please fill this field.",
                'slug.required' => "Please fill this field.",
                'description.required' => "Please fill this field.",
                'category_id.required' => "Please selete the category",
            ]
        );

        $posts = new Post();

        $posts->category_id = $request->category_id;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->description = $request->description;
        $posts->status = $request->status == true ? '1':'0';
        $posts->created_by = Auth::user()->id;
        $posts->save();

        return redirect('admin/posts')->with('status', 'Successfully added a post');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
