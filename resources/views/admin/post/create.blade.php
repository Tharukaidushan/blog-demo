@extends('layouts.master')
@section('title', 'Add-Post')
@section('sub-title', 'Add a new post')

@section('content')
    <div class="card shadow mb-4 mx-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Post</h6>
        </div>
        <div class="card-body p-3">
            <form action="{{ route('admin.post.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="Category name">Post Title</label>
                    <input type="text" name="title" id="title" class="form-control bg-light border-0 small"
                        placeholder="Post title">
                    <small id="emailHelp" class="form-text text-muted">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </small>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control bg-light border-0 small"
                        placeholder="New slug">
                    <small id="emailHelp" class="form-text text-muted">
                        @error('slug')
                            {{ $message }}
                        @enderror
                    </small>
                </div>

                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="category_id">
                    <option selected>Choose...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control bg-light" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                    <small id="emailHelp" class="form-text text-muted">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </small>
                </div>


                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlInline" name="status">
                    <label class="custom-control-label" for="customControlInline">Status</label>
                </div>
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-auto me-auto">
                            <button class="btn btn-secondary btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Back</span>
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-success btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Save Category</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
