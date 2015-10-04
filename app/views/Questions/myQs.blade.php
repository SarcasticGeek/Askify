@extends ('main')

@section('content')
<div class="questionlist">
	 <h1>My Questions:</h1>
	 @if(!$questions)
		 <p>No Quests</p>
	 @else
		 <ul>
			 @foreach($questions as $question)
				 <li>{{ str_limit($question->question,40,"...") }}
					  ({{ count($question->answers) }} {{str_plural('Answer',count($question->answers))}})
					 {{ HTML::linkRoute('question','View',$question->id) }}
					  </li>
			 @endforeach
		 </ul>
		 {{ $questions->links()}}
	 @endif
 </div>
@stop