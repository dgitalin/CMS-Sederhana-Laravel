@extends('layouts.admin')

@section('content')
    <h1>Create New Page</h1>
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Page</button>
    </form>
@endsection
