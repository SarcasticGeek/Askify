@extends('main')
@section('content')
<head>
<style>
#report-btn{
	background: white;
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  -webkit-box-shadow: 0px 1px 3px #666666;
  -moz-box-shadow: 0px 1px 3px #666666;
  box-shadow: 0px 1px 3px #666666;
  font-family: Arial;
  color: #143de0;
  padding: 10px 20px 10px 20px;
  border: solid #143de0 2px;
  text-decoration: none;
  margin-bottom: 129px;
  margin-top: 25px;
}
#report-btn:hover {
	background: #edf2f5;
  text-decoration: none;
}
}

</style>
</head>

<body>
<form method="post">
<?php
$reported=Request::segment(3);
?>
<br>
<br>
<br>
<p>You Are Going To Report <strong><?php echo $reported;?></strong></p>
<p>Note: By Clicking On "Report" This User Will Be <strong>Banned</strong> From The Website And Will Not Be Able To Access It Again</p>
<br>
<label for="username">Reason For Banning:</label><br>
<textarea type="text" id="reason" name="reason" style=width:500px;height:80px;></textarea><br>
<input type="submit" value="Report" id="report-btn">
</form>

</body>
@stop