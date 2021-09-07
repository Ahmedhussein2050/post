@extends('layouts.app')
@section('title')
    profile
@endsection
@section('content')
    <div class="d-flex justify-content-center">
        <div class="w-75 bg-white p-4 rounded-lg">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="card m-auto w-75" style="width: 18rem; margin-top: 12px; margin-bottom: 12px !important;">
                        <div class="card-body post-card">
                            <small>
                                {{$post->created_at->diffForHumans()}}
                                <b>by
                                    <a href="{{ route('users.posts', $post->user) }}" class="text-decoration-none text-success">{{$post->user->name}}</a>
                                </b>
                            </small>
                            <p class="card-text mt-3">{{substr($post->body,0,255)}}
                                @if(strlen($post->body) > 100)
                                    <a href="{{ url('posts',$post->id) }}">
                                        Read More
                                    </a>
                                @endif
                            </p>
                            @if($post->image != null)
                                <img
                                    class="img img-fluid mb-4"
                                    style="width: 600px; display: block !important;"
                                    src="{{asset($post->image)}}"
                                    alt="not found"
                                >
                            @endif
                            <div class="d-flex justify-content-start">
                                <a href="{{ url('posts',$post->id) }}" class="text-decoration-none text-secondary" style="margin-top: 6px">show</a>
                                @auth()
                                    <div class="d-flex justify-content-center ml-2">
                                        @if($post->likedBy())
                                            <form class="" action="{{ route('posts.likes', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    style="outline: none !important; box-shadow: none !important; padding: 5px !important;"
                                                    type="submit"
                                                    class="btn text-decoration-none text-secondary"
                                                >
                                                    unlike
                                                </button>
                                            </form>
                                        @else
                                            <form class="" action="{{ route('posts.likes', $post) }}" method="POST">
                                                @csrf
                                                <button
                                                    style="outline: none !important; box-shadow: none !important; padding: 5px !important;"
                                                    type="submit"
                                                    class="btn text-decoration-none text-secondary"
                                                >
                                                    like
                                                </button>
                                            </form>
                                        @endif

                                        <span style="margin-top: 6px; margin-left: 2px"> {{ $post->likes->count() }} {{ \Illuminate\Support\Str::plural('like', $post->likes->count()) }} </span>
                                    </div>

                                    @can('delete', $post)
                                        <form class="" action="{{ route('posts.destroy', $post) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                style="outline: none !important; box-shadow: none !important; padding: 5px !important;"
                                                type="submit"
                                                class="btn text-decoration-none text-secondary"
                                            >
                                                delete
                                            </button>
                                        </form>
                                    @endcan

                                @endauth
                            </div>
                            {{--                        @if(auth()->user()->id == $post->user_id)--}}
                            {{--                            <a href="{{url('post/'.$post->id.'/edit')}}" class="btn btn-success">edit</a>--}}
                            {{--                            <a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger">delete</a>--}}
                            {{--                        @endif--}}
                        </div>
                    </div>
                @endforeach
                <div class="w-75 m-auto">
                    {{$posts->links()}}
                </div>
            @endif
            @if(count($posts) == 0)
                <p><b>No posts in this time</b></p>
            @endif
        </div>
    </div>
@endsection
