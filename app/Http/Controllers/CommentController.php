<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $post->comments()->create($request->all());
        return redirect()->route('posts.show', $post);
    }

    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        return back();
    }
    public function edit(Comment $comment)
    {
    return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
    $comment->update($request->all());
    return redirect()->route('posts.show', $comment->post);
    }
}
