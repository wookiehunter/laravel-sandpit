<div class="form-group">
    <label for="title">Title</label>
    <input id="title" class="form-control" type="text" name="title" id="" value="{{ old('title', optional($post ?? null)->title) }}">
</div>
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>  
@enderror
<div class="form-group">
    <label for="content">Content</label>
    <input class="form-control" id="content" type="text" name="content" id="" cols="30" rows="10" value="{{ old('content', optional($post ?? null)->content) }}" />
</div>
@error('content')
<div class="alert alert-danger">{{ $message }}</div>  
@enderror
@if($errors->any())
    <div class="mb-2">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif