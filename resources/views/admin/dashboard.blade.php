@extends('layouts.admin')

@section('content')
<div class="container mt-5">
<h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Articles</h5>
                    <p class="card-text">{{ $totalArticles }}</p>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">View Articles</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Comment</h5>
                    <p class="card-text">{{ $totalComments }}</p>
                    <a href="{{ route('admin.comments.index') }}" class="btn btn-primary">View Comment</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text">{{ $totalCategories }}</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">View Categories</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Tags</h5>
                    <p class="card-text">{{ $totalTags }}</p>
                    <a href="{{ route('tags.index') }}" class="btn btn-primary">View Tags</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
