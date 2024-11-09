<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
            'captcha' => 'required|captcha',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'approved' => false,
        ]);

        return back()->with('message', 'Comment submitted, awaiting approval.');
    }
}
