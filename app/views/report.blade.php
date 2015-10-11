@extends('main')
@section('content')
<?php
session_start();
?>

<body>
<form>
<?php
$reported = $_GET['reported'];
echo $reported;
?>
<label for="username">Reason:</label><br>
<textarea type="text" id="reason"></textarea><br>
<input type="submit" value="Report">
<p>Note: By Clicking On "Report" This User Will Be Banned From The Website And Will Not Be Able To Access It Again</p>

</body>
@stop