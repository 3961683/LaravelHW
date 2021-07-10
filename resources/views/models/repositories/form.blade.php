<?php
$repository = $repository ?? null;
?>


<h1>@if($repository) Edit post @else Create post @endif</h1>

<form action="{{$repository ? route('repositories.update', $repository) : route('repositories.store') }}" method="post">
    @csrf


    @if($repository)
        @method('put')
    @endif

    <div>
        <label>Title</label>
    </div>
    <div>
        <input value="{{ old('title', $repository->title ?? null) }}" type="text" name="title" id="title" required autofocus />
        @error('title')
        <span>{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="content">Description</label>
    </div>
    <div>
        <textarea name="description" id="description" required>{{ old('description', $repository->description ?? null) }}</textarea>
        @error('description')
        <span>{{$message}}</span>
        @enderror
    </div>

    <div>
        <label for="content">Password</label>
    </div>
    <div>
        <textarea name="password" id="password" required>{{ old('password', $repository->password ?? null) }}</textarea>
        @error('password')
        <span>{{$message}}</span>
        @enderror
    </div>

    <button>@if($repository) Edit post @else Create post @endif</button>
</form>
