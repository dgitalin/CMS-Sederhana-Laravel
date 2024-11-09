@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
</div>
@endsection
