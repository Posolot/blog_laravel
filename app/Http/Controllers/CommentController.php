<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:500',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Комментарий добавлен и ожидает подтверждения.');
    }
    public function approve(Comment $comment)
    {
        $comment->update(['is_approved' => true]);
        return back()->with('success', 'Комментарий подтвержден.');
    }

    public function reject(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Комментарий отклонен.');
    }

    public function approvePage()
    {
        $comments = Comment::where('is_approved', false)->get();
        return view('comments.approve', compact('comments'));
    }
    public function moderate()
    {
    $comments = Comment::where('is_approved', false)->with('post')->get();
    return view('comments.moderate', compact('comments'));
    }
}

