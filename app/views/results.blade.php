
@extends('main')
<style >
body{
    text-align: center;

}
#footer
{
    bottom: -319; 
}
</style>
@section('content')
    <h1>Search Results</h1>
    @if(count($questions)===0)
        <p>Nothing found, please try a different search.</p>
    @else
        <ul>
            @foreach($questions as $question_)
                <li>
                    {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                    by {{ ucfirst($question_->user->username) }}
                </li>
            @endforeach
        </ul>

        {{ $questions->links() }}
    @endif
@stop