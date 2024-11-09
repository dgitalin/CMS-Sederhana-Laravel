<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

class AdminController extends Controller
{
    public function index()
    {
        $totalArticles = Post::count();
        $totalComments = Comment::count();
        $totalCategories = Category::count();
        $totalTags = Tag::count();

        return view('admin.dashboard', compact('totalArticles', 'totalComments', 'totalCategories', 'totalTags'));
    }
}