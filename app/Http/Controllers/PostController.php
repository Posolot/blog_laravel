<?php
 
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->get();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
       $comments = $post->comments()->where('is_approved', true)->get();
       return view('posts.show', compact('post', 'comments'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function publish(Post $post)
    {
        $post->update(['is_published' => true]);
       //event(new PostPublished($post));
        return redirect()->route('posts.index');
    }
    public function unpublish(Post $post)
    {
        $post->update(['is_published' => false]);
        return redirect()->route('posts.index');
    }
    public function drafts()
    {
        $posts = Post::where('is_published', false)->get();
        return view('posts.drafts', compact('posts'));
    }
}
