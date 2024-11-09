<!-- resources/views/frontend/articles/index.blade.php -->
@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Explore Our Latest Articles</h1>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card article-card h-100 shadow-sm border-0">
                    <div class="article-image-wrapper">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top article-image" alt="{{ $post->title }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('articles.show', $post->slug) }}" class="mt-auto btn btn-primary stretched-link">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection

<style>
    .article-card {
        transition: transform 0.3s ease;
    }
    .article-card:hover {
        transform: translateY(-10px);
    }
    .article-image-wrapper {
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }
    .article-image {
        transition: transform 0.4s ease;
    }
    .article-image:hover {
        transform: scale(1.1);
    }
</style>
