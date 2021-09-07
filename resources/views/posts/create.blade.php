@extends('layouts.app')
@section('title')
    posts
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-75 bg-white p-4 rounded-lg">
            @include('inc.createPostForm')
        </div>
    </div>
@endsection
