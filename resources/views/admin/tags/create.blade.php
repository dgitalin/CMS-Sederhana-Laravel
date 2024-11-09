@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Create Tag</h2>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Tag Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection