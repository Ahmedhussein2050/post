@extends('layouts.app')
@section('title')
    Post
@endsection
@section('content')

    <div class="py-5">

        @if($post->image == null)
            <div class="text-center">
                <small>{{$post->created_at}}</small>
                <b>by
                    <a href="{{ route('users.posts', $post->user) }}" class="text-decoration-none text-success">{{$post->user->name}}</a>
                </b>
                <p class="w-50 m-auto" style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                    {{$post->body}}
                </p>
                <a href="{{ route('posts') }}" class="nav-link text-secondary">back</a>
{{--                @if(auth()->user()->id == $post->user_id)--}}
{{--                    <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>--}}
{{--                    <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>--}}
{{--                @endif--}}
            </div>
        @endif
        @if($post->image != null)

            <div class="col-lg-6">
                <div class="my-3">
                    <img
                        class="img img-fluid mb-4"
                        style="width: 600px; display: block !important;"
                        src="{{asset($post->image)}}"
                        alt="not found"
                    >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-3">
                    <small>{{$post->created_at}}</small>
                    <b>by {{$post->user->name}}</b>
                    <p style="line-height: 1.6; margin-top: 16px !important; margin-bottom: 16px !important; ">
                        {{$post->body}}
                    </p>
                    <a href="{{ route('posts') }}" class="card-link">back</a>
{{--                    @if(auth()->user()->id == $post->user_id)--}}
{{--                        <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>--}}
{{--                        <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>--}}
{{--                    @endif--}}
                </div>
            </div>

        @endif
    </div>
@endsection
