<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts(){
        $posts = Post::with(['user', 'likes'])->orderBy('updated_at', 'desc')->paginate(5);
        return view('posts.posts')->with('posts', $posts);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(StorePost $request): RedirectResponse
    {
        $validated = $request->validated();
        $imageName = '';

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imageName = 'images/'.$name;
        }
        $request->user()->posts()->create([
            'body' => $validated['body'],
            'image' => $imageName,
        ]);
        return redirect()->route('posts');
    }
    public function show($id)
    {
        $post = Post::query()->findOrFail($id);
        return view('posts.show')->with('post', $post);
    }
    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
