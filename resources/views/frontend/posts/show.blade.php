<!-- resources/views/frontend/articles/show.blade.php -->
@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="card shadow-sm border-0">
                <div class="article-image-wrapper">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top article-image-detail" alt="{{ $post->title }}">
                </div>
                <div class="card-body">
                    <h1 class="card-title mb-4">{{ $post->title }}</h1>
                    <p class="text-muted">Published on {{ $post->created_at->format('F j, Y') }}</p>
                    <div class="content mt-4">
                        {!! $post->content !!}
                    </div>
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-5">Back to Articles</a>
                </div>
            </div>
        </div>
    </div>
     <!-- Form Komentar -->
     <div class="row mt-5">
        <div class="col-lg-8 offset-lg-1">
            <h4>Leave a Comment</h4>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>CAPTCHA</label>
                    {!! captcha_img() !!}
                    <input type="text" name="captcha" class="form-control mt-2" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Daftar Komentar -->
    <div class="row mt-5">
        <div class="col-lg-8 offset-lg-1">
            <h4>Comments</h4>
            @foreach($post->comments->where('approved', true) as $comment)
                <div class="mb-3">
                    <strong>{{ $comment->name }}</strong>
                    <p>{{ $comment->comment }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<style>
    .article-image-wrapper {
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }
    .article-image-detail {
        width: 100%;
        height: auto;
        object-fit: cover;
        max-height: 400px;
    }
</style>
