@extends('layouts.app')

@section('title', 'Update the Post')

@section('content')
<form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('posts.partials.form')
    <div><input class="btn btn-primary btn-block" type="submit" value="Update"></div>
</form>
@endsection