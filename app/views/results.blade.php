
@extends('main')
<style >
body{
    text-align: center;

}
#footer
{
    bottom: -500; 
}
</style>
@section('content')
    <h1>Search Results</h1>
    @if(count($questions)===0) 

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

        @endif
        
    @endif
   
@stop