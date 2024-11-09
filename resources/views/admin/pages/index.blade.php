@extends('layouts.admin')

@section('content')
    <h1>Pages</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary">Add New Page</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
