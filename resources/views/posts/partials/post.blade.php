{{-- @includes version --}}
{{-- @break($key == 2) --}}
{{-- @continue($key == 1) --}}
{{-- @if ($loop->even)
    <div class="container">
        <h1>{{ $post->title ?? '' }}</h1>
        <p>{{ $post->content ?? '' }}</p>
        <p>Post ID: {{ $key }}</p>
    </div>
@else
<div style="background-color: silver" class="container">
    <h1>{{ $post->title ?? '' }}</h1>
    <p>{{ $post->content ?? '' }}</p>
    <p>Post ID: {{ $key }}</p>
</div>
@endif --}}

{{-- @each alternative --}}
<div class="container">
    <h3><a class="" href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title ?? '' }}</a></h3>
    <p>{{ $post->content ?? '' }}</p>
    {{-- <p>Post ID: {{ $key }}</p> --}}
</div>

<div class="container d-flex flex-row w-50 justify-content-around">
    <a class="btn btn-outline-success mr-5" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
    <form class="d-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input class="btn btn-outline-danger ml-5" type="submit" value="Delete">
    </form>
</div>