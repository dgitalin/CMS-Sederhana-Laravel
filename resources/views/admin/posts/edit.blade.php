@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Post Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <select name="tags[]" class="form-control" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" 
                        {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <!-- Textarea disembunyikan -->
            <textarea name="content" id="content" style="display: none;">{{ $post->content }}</textarea>
            <!-- Div Quill Editor -->
            <div id="quill-editor" style="height: 200px;"></div>
        </div>
        <div class="form-group mb-3">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        @if($post->image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="150">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
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