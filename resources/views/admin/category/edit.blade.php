@extends('layouts.master')
@section('title', 'Edit category')

@section('content')
    <div class="card shadow mb-4 mx-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit a Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update-category/'. $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="Category name">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control bg-light border-0 small"
                        placeholder="Category name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control bg-light border-0 small"
                        placeholder="New slug">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control bg-light border-0 small"
                        placeholder="Category description">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="Meta Title">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control bg-light border-0 small"
                        placeholder="Meta title">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <input type="text" name="meta_description" value="{{ $category->meta_description }}" class="form-control bg-light border-0 small"
                        placeholder="Meta title">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keyword" value="{{ $category->meta_keyword }}" class="form-control bg-light border-0 small"
                        placeholder="Meta keywords">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="navbar_status" {{ $category->navbar_status == '1' ? 'checked':'' }} class="custom-control-input" id="navbarCheck">
                        <label class="custom-control-label" for="navbarCheck">Navbar Status</label>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }} class="custom-control-input" id="statusCheck">
                        <label class="custom-control-label" for="statusCheck">Status</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success btn-icon-split" type="submit"><span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Update Category</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
