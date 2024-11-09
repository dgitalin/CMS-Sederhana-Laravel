@extends('layouts.admin')

@section('content')
    <h1>Edit Page</h1>
    <form action="{{ route('pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $page->title }}">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5">{{ $page->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
@endsection
