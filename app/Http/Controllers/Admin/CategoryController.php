<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => [
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

                'image' => [
                    'required',
                    'mimes:jpeg,jpg,png'
                ],

                'meta_title' => [
                    'required',
                ],

                'meta_description' => [
                    'required',
                    'string'
                ],

                'meta_keyword' => [
                    'required',
                    'string'
                ],

                'navbar_status' => [
                    'nullable'
                ],

                'status' => [
                    'nullable'
                ],
            ],
            [
                'name.required' => "Please fill",
            ]
        );

        $category = new Category();

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $imageFile = $request->hasFile('image');
        if ($imageFile) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return view('admin.category.index')->with('status', 'Category added Successfully');
    }
}
