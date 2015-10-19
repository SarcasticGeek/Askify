
@extends('main')
<style >
body{
    text-align: center;

}
.section-primary
{

    position: relative;bottom: -280px

}
.questionlist ul{
        text-align: left;
        background-color: #f2f3e7;
        border-radius:5px;
        margin:-13px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .question.form-control{
        width:40px;
        margin: 50px;
    }
    h1
    {
        font-size: 14em;

    }
</style>
<script >

}
</script>

@section('content')
<h3>Search by</h3>
<div class="questionlist">
    
    <form   >
        <div class="dropdown">
    <a role="button" href="/results/question:{{$keyword}}" class="btn btn-info" >Questions</a>
    <a role="button" href="/results/answer:{{$keyword}}"  class="btn btn-info">Answers</a>
    <a role="button" href="/results/username:{{$keyword}}" class="btn btn-info" >Users</a>
    <a role="button" href="/results/date:{{$keyword}}" class="btn btn-info">Date</a>
    <a role="button" href="/results/tag:{{$keyword}}" class="btn btn-info">Tag</a>
    <a role="button" href="/results/unsolved:" class="btn btn-info">Unsolved questions</a>
    <a role="button" href="/results/before:{{$keyword}}" class="btn btn-info">Before date</a>
    <a role="button" href="/results/after:{{$keyword}}" class="btn btn-info">after date</a>
</div>
</form>


    @if(isset($questions))
        @if(count($questions)=== 0) 

            <p>Nothing found,please try a different search.</p>
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
    @endif
    
    @if(isset($tags))
          @if(count($tags)===0)  

            <p>Nothing found,please try a different search.</p>
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

    @endif

    @if(isset($answers))
             @if(count($answers)===0)  

            <p>Nothing found,please try a different search</p>
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
    @if(isset($message))
    <p>{{$message}}</p>
    @endif  
    
   </div>
@stop