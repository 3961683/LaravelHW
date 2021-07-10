<h1>Repositories</h1>
<a href="{{ route('repositories.create') }}">Go to form</a>

@if($repositories->isNotEmpty())
    <ol>

        @foreach($repositories as $repository)
            <li value="{{$repository->id}}">
                <a href="{{ route('repositories.show', $repository) }}">
                    {{$repository->title}}
                </a>
            </li>
        @endforeach
    </ol>
@else


    <h1>Nothing new here, come later ;)</h1>
@endif
