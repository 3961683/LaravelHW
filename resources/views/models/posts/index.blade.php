<h1>Posts</h1>
<a href="{{route('posts.create')}}">Go to form</a>

@if($posts->isNotEmpty())
<ol>

    @foreach($posts as $post)
        <li value="{{$post->id}}">
           <a href="{{ route('posts.show', $post) }}">
               {{$post->title}}
           </a>
        </li>
    @endforeach
</ol>
@else


    <h1>Nothing new here, come later ;)</h1>
@endif
