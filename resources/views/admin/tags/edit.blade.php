@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Tag</h2>
    <form action="{{ route('tags.update', $tag) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Tag Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $tag->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection