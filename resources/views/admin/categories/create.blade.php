@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">Back to Categories</a>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" value="{{ old('name') }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection