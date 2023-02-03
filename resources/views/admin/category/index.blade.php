@extends('layouts.master')
@section('title', 'Category')

@section('content')
    <div class="container-fluid px-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <div class="row">

        </div>
    </div>
@endsection
