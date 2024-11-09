@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Create Post</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Post Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <select name="tags[]" class="form-control" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <!-- Textarea disembunyikan -->
            <textarea name="content" id="content" style="display: none;"></textarea>
            <!-- Div Quill Editor -->
            <div id="quill-editor" style="height: 200px;"></div>
        </div>
        <div class="form-group mb-3">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="form-group mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    // Inisialisasi Quill editor
    var quill = new Quill('#quill-editor', {
        theme: 'snow'
    });

    // Isi Quill dengan konten awal dari textarea saat edit post
    quill.root.innerHTML = document.getElementById('content').value;

    // Update textarea dengan konten Quill sebelum submit
    document.querySelector('form').onsubmit = function () {
        document.getElementById('content').value = quill.root.innerHTML;
    };
</script>

@endsection('script')