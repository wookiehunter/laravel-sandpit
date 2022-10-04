@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<form class="mt-3" action="{{ route('posts.store') }}" method="POST">
    @csrf
    @include('posts.partials.form')
    <div class="mt-3">
        <input class="btn btn-primary btn-block" type="submit" value="Create">
    </div>
</form>
@endsection