@extends('layouts.master')
@section('title', 'Category')
@section('sub-title', 'All categories')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><img src="{{ asset('uploads/category/' . $category->image) }}" width="50px"
                                    height="50px">
                            </td>
                            <td>{{ $category->status == '0' ? 'Hidden' : 'Show' }}</td>
                            <td>
                                <a href="{{ url('admin/edit-category/' . $category->id) }}"
                                    class="btn btn-light btn-icon-split">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>

                                <a href="{{ url('admin/delete-category/' . $category->id) }}"
                                    class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-100">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">delete</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
