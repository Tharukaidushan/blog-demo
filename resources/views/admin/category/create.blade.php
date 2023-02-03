@extends('layouts.master')
@section('title', 'Add-Category')

@section('content')
    <div class="card shadow mb-4 mx-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Category name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control bg-light border-0 small"
                        placeholder="Category name">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control bg-light border-0 small"
                        placeholder="New slug">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control bg-light border-0 small"
                        placeholder="Category description">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <hr>
                <div class="mb-3">
                    <label for="Meta Title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control bg-light border-0 small"
                        placeholder="Meta title">
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <input type="text" name="meta_description" class="form-control bg-light border-0 small"
                        placeholder="Meta title">
                </div>
                <div class="mb-3">
                    <label>Meta Keywords</label>
                    <input type="text" name="meta_keyword" class="form-control bg-light border-0 small"
                        placeholder="Meta keywords">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="navbar_status" class="custom-control-input" id="navbarCheck">
                        <label class="custom-control-label" for="navbarCheck">Navbar Status</label>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="status" class="custom-control-input" id="statusCheck">
                        <label class="custom-control-label" for="statusCheck">Status</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success btn-icon-split" type="submit"><span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Save Category</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
