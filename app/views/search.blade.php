


@section('content')

    <h1>Search Results</h1>

    @if($questions->results )
        <p>Nothing found, please try a different search.</p>
    @else
        <ul>
            @foreach($questions->question as $question)
                <li>
                    {{ HTML::linkRoute('question', $questions->question, $question->id) }}
                    by {{ ucfirst($question->user->username) }}
                </li>
            @endforeach
        </ul>

        {{ $questions->links() }}
    @endif
@endsection
