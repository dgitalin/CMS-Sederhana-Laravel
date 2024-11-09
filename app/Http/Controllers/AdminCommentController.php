<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::where('approved', false)->get();
        return view('comments.index', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return back()->with('message', 'Comment approved');
    }
}
