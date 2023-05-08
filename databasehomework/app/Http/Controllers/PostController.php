<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:25',
        'content' => 'required|max:60',
        'image' => 'nullable|image|max:2048', // Add validation for the image
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storePubliclyAs('images', $imageName, 'public');
    } else {
        $imagePath = null;
    }

    $post = new Post([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'image' => $imagePath,
        'user_id' => Auth::id(),
    ]);

    $post->save();

    return redirect()->route('user.profile', ['id' => Auth::id()]);
}



    public function show($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() != $post->user_id) {
            abort(403);
        }

        return view('posts.show', ['post' => $post]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() != $post->user_id) {
            abort(403);
        }

        // Delete the image file if it exists
        if ($post->image) {
            Storage::delete('public/images/' . $post->image);
        }

        $post->delete();

        return redirect()->route('user.profile', ['id' => Auth::id()]);
    }



}
