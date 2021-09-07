<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request): RedirectResponse
    {
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }
    public function destroy(Post $post, Request $request): RedirectResponse
    {
        $request->user()->likes->where('post_id', $post->id)->each->delete();
        return back();
    }
}

