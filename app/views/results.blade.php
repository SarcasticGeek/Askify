
@extends('main')
<style >
body{
    text-align: center;

}
#footer
{

    margin-bottom: 150px; 
    margin-bottom: 150px; 

}
</style>
@section('content')
    <h1>Search Results</h1>
    @if(count($questions)=== 0) 

        <p>No Questions found, please try a different search.</p>
    @else
        <ul>
            @foreach($questions as $question_) 
                <li>
                    {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                    by {{ ucfirst($question_->user->username) }}
                </li>
            @endforeach
        </ul>

     {{$questions->links()}}
    @endif
    
    @if(Auth::User()->iFadmin ==1)
    
      @if(count($tags)===0)  

        <p>No tags found, please try a different search.</p>
    @else
        <ul>
            
            @foreach($tags as $tag) 
                <li>
                    {{ HTML::linkRoute('tag', $tag->name, $tag->id) }}
                </li>
            @endforeach

        </ul>
{{ $tags->links()}}
        @endif


         @if(count($answers)===0)  

        <p>No answers found, please try a different search.</p>
    @else
        <ul>
            
            @foreach($answers as $answer) 
                <li>
                    {{ HTML::linkRoute('question', $answer->answer, $answer->question_id) }}
                </li>
            @endforeach

        </ul>
{{ $answers->links()}}
        @endif
        
        
    @endif
   
@stop