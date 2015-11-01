@extends ('main')

<style>
.questionlist ul{
		text-align: left;
		background-color: #f2f3e7;
		border-radius:5px;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 20px;
		margin-bottom: 20px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
}

</style>

@section('content')
<div class="questionlist">
	 @if(!$questions)
		 <p>No Quests</p>
	 @else
			 @foreach($questions as $question)
				<ul>
					<p>{{ str_limit($question->question,40,"...") }}</p>
					<p style="font-size: 12px">({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}}) {{ HTML::linkRoute('question','View',$question->id) }}--
					  {{ HTML::linkRoute('edit_question','Edit',$question->id)}}--
					  {{ HTML::linkRoute('delete_question','Delete',$question->id)}}</p>
					  
					
				</ul>
			 @endforeach

	 @endif
 </div>
@stop