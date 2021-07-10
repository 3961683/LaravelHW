<h1>{{$repository->title}}</h1>
<a href="{{route('repositories.index')}}">All repositories</a>

<div>
    <small>Created at: {{$repository->created_at}}</small>
</div>

<p>{{$repository->description}}</p>


<a href="{{route('repositories.edit', $repository)}}">Edit post</a>

<form action="{{route('repositories.delete', $repository)}}" method="post">
    @csrf
    @method('delete')

    <button>Delete post</button>
</form>
