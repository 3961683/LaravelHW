<?php
$post = $post ?? null;
?>


<h1>@if($post) Edit post @else Create post @endif</h1>

<form action="{{$post ? route('posts.update', $post) : route('posts.store') }}" method="post">
    @csrf

    @if($post)
        @method('put')
    @endif

    <div>
        <label>Header</label>
    </div>
    <div>
        <input value="{{ old('title', $post->title ?? null) }}" type="text" name="title" id="title" required autofocus />
        @error('title')
            <span>{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="content">Post</label>
    </div>
    <div>
        <textarea name="content" id="content" required>{{ old('content',$post->content ?? null) }}</textarea>
        @error('content')
        <span>{{$message}}</span>
        @enderror
    </div>

    <button>@if($post) Edit post @else Create post @endif</button>
</form>
