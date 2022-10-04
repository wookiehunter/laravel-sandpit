@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
{{-- @if (count($posts) > 0)
@foreach ($posts as $key => $post)
    <div class="container">
        <h1>{{ $post['title'] ?? '' }}</h1>
        <p>{{ $post['content'] ?? '' }}</p>
        <p>Post ID: {{ $key }}</p>
    </div>
@endforeach
@else
    <div class="container">
        <h1>No posts found</h1>
    </div>
@endif --}}

@each('posts.partials.post', $posts , 'post', 'posts.partials.no-posts')

{{-- @forelse ($posts as $key => $post)
    @include('posts.partials.post', ['post' => $post, 'key' => $key])
@empty
    <div class="container">
        <h1>No posts found</h1>
    </div>
@endforelse --}}

{{-- <div>
    @for ($i = 0; $i < 10; $i++)
        <p>The current value is {{ $i }}</p>
    @endfor
</div>

<div>
    @php $done = false; @endphp
    @while (!$done)
        <p>Looping...</p>
        @php 
            if (random_int(0, 1) == 1) {
                $done = true;
            }
        @endphp
    @endwhile
</div> --}}

@endsection