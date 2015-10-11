@extends('main')
@section('content')

<style>
#ban-result{
	text-align: center;
	font-size: 15px;
	margin-top: 150px;
	margin-bottom: 173px;
}

</style>

<div id="ban-result">
<p>Sorry This Account Has Been Banned. You Can't Access The Website</p>
<p>More Info:</p>
<?php
$user = Auth::User();
$reason = Report::where('user_id',$user->id)->get()->first()->reason;
$question_id = Report::where('user_id',$user->id)->get()->first()->question_id;
$question = Question::where('id',$question_id)->get()->first()->question;
echo "Username: $user->username";
echo "<br>";
echo "Your Question: $question";
echo "<br>";
echo "Reason: $reason";
?>
</div>

@stop