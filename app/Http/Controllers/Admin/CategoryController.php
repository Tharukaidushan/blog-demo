<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
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
                'name.required' => "Please fill this field.",
                'slug.required' => "Please fill this field.",
                'description.required' => "Please fill this field.",
                'image.required' => "Please add the image (jpg, jpeg, png).",
                'meta_title.required' => "Please fill this field.",
                'meta_description.required' => "Please fill this field.",
                'meta_keyword.required' => "Please fill this field.",
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

        return redirect('admin/category')->with('status', 'Category added Successfully');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category_id)
    {
        $request->validate(
            [
                'name' => [
                    'string',
                    'max:200'
                ],

                'slug' => [
                    'string',
                    'max:200'
                ],

                'image' => [
                    'mimes:jpeg,jpg,png'
                ],

                'meta_description' => [
                    'string'
                ],

                'meta_keyword' => [
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
                'description.required' => "Please fill this field.",
                'image.required' => "Please add the image (jpg, jpeg, png).",
                'meta_title.required' => "Please fill this field.",
                'meta_description.required' => "Please fill this field.",
                'meta_keyword.required' => "Please fill this field.",
            ]
        );

        $category = Category::find($category_id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $imageFile = $request->hasFile('image');
        if ($imageFile) {
            //Delete Existing Image
            $destination = 'uploads/category/' .$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

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
        $category->update();

        return redirect('admin/category')->with('status', 'Successfully updated!');
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        if($category){
            //Delete Existing Image
            $destination = 'uploads/category/' .$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $category->delete();
            return redirect('admin/category')->with('status', 'Successfully deleted!');
        }else{
            return redirect('admin/category')->with('bad', 'Can not find the category');
        }
    }

}
