@extends('layouts.app')

@section('title', $post->title ?? '' )

<div>
    @section('content')
{{-- @if ($post['is_new'])
    <h1>Recent Post</h1>
@elseif (!$post['is_new'])
    <h1>Old Post</h1>
@endif --}}

{{-- @if ($post['is_new'])
    <h1>Recent Post - using IF</h1>
@else
    <h1>Old Post - using ELSE</h1>
@endif

@unless ($post['is_new'])
    <h1>Old Post - using UNLESS</h1>
@endunless --}}

<div class="container mt-3">
    <h1>{{ $post->title ?? '' }}</h1>
    <p>{{ $post->content ?? '' }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>

    @if (now()->diffInMinutes($post->created_at) < 1440)
        <strong class="alert alert-info">New!</strong>
    @endif
</div>

{{-- @isset ($post['has_comments'])
    <div class="container">
        <p>Comments here... - using ISSET</p>
    </div>
@endisset --}}

@endsection
</div>