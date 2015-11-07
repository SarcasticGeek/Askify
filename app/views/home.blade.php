@extends('main')
@section('title')
Home
@stop
<style>
	body{
		text-align: center;
	}
	.navbar-inverse .navbar-collapse{
	}
	.question{
		border: 1px solid #e5e5e5;
		margin:-13px;
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 20px;
		padding-top: 5px;
		padding-bottom: 5px;
		height: 130px;
	}

	.question.form-control{
		width:40px;
		margin: 50px;
	}
	.questionlist ul img
	{
		border-radius: 50%;
	}
	input[type="checkbox"] {
		width:15px;
    	height:15px;
		vertical-align:-2px;
		box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
	}

	#ask{
		margin-left: -1200px;
		margin-top: -5px;
		width: 120px;
	}
	#label{
		margin-top: -100px;
		margin-left: 200px;
	}
	#tag{
		margin-left: -10px;
		margin-top: 30px;
	}
	
	#right{
		margin-top: 15px;
		float: right;
		width: 850px;
	}
	#left {
		margin: 20px;
		margin-left: -15px;
		width: 250px;
		height: 730px;
		background-color: #4183D7;
		float: left;
	}
	#left .nav a{
		width: 250px;
		height: 120px;
		color: #ECF0F0;
		font-size: 25px;
		text-align: left;
		border:0px;
		border-top:2px solid #ECF0F0;
		border-radius: 0;
		padding-left:32px;
	}
	#left .nav > li.active > a, #left .nav > li > a:hover{background-color: #286193;}

	
	#left .Tags a{
		border-bottom:2px solid #ECF0F0;
	}
	#left .arrow1, #left .arrow2, #left .arrow3, #left .arrow0{
		width: 0;
		height: 0;
		border-top: 20px solid transparent;
		border-bottom: 20px solid transparent;
		border-right: 20px solid #ECF0F0;
		margin-right: 0px;
		margin-top: -100px;
		float: right;
		position: relative;
	}
	#left .arrow3{
		margin-top: -110px;
	}	
	#left .nothing{
		top: -110px;
		left: 18%;
		text-align: left;
		color: #ECF0F0;
		height:auto;
	}
	.tagname{
		position: relative;
		left: 700px;
	}
	.user_name{
		font-size: 20px;
		font-style: bold;
		display: block;
		font-weight: bold;
	}
	.question_name, .count_answers{
		font-size: 12px;
		margin-left: 35px;
	}
	.panel-title{
		font-size: 20px;
		font-style: bold;
		display: block;
		font-weight: bold;
	}
	.panel-title:first-letter {
    text-transform: capitalize;
	}


</style>


@section('content')
<?php
session_start();
?>
@if($reportsuccess = Session::get('report-success'))
{{$reportsuccess}}
@endif

	<div id="left" style="display:block;">


		<ul class="nav nav-pills nav-stacked">
		  

		    <li role="presentation" class="All" id="number0">
		    	<a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a>
		    	<div class="arrow0"></div>
		    </li>
		    <li role="presentation" class="Date" id="number1">
		    	<a href="#date" aria-controls="date" role="tab" data-toggle="tab">Date</a>
		    	<div class="arrow1"></div>
		    </li>
		    <li role="presentation" class="Answered" id="number2">
		    	<a href="#answered" aria-controls="answered" role="tab" data-toggle="tab">Answered</a>
		    	<div class="arrow2"></div>
		    </li>
		    <li role="presentation" class="Tags" id="number3">
		    	<a href="#tags" aria-controls="Tags" role="tab" data-toggle="tab">Tags</a>
		    	<div class="arrow3"></div>
		    </li>
		    <li class ="nothing">
				@foreach($tags as $tag)
					<ul style="font-size: 18px">
				    	{{Form::checkbox('tags',$tag->id,false)}}
				   		{{Form::label($tag->name) }}
				   	</ul>
				@endforeach
			</li>

	  	</ul> 		
	</div>
	<div id="right">
		@if(Auth::User()->iFadmin != 1)
	 		<div class="question" style="background-color:#f0f0f0">
	 			{{Form::open(array('url'=>'home'))}}
	 			<textarea class="form-control"  style="width:750px; margin-top:5px;" name="question" placeholder="Put your question here!"></textarea>
				<div id="tag">
		  			<div class="dropdown">
		  				<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius:0">Tags
		  				<span class="caret"></span></button>
		  				<ul class="dropdown-menu dropdown-menu-right top1"  style="margin-top: -65px;background-color:rgba(0,0,0,0.6); color:white;padding: 20px;padding-top: 10px; padding-bottom: 5px;">

					 	   @foreach($tags as $tag)
					    		<li>
								{{ Form::checkbox('tags[]',$tag->id,false)}}
		    					{{Form::label($tag->name) }}
		    				</li>

					    	@endforeach
					  	</ul>
					</div>
				</div>
				<br/>
		    	{{Form::submit('Ask',array('class'=>'btn btn-infoo ','id'=>'ask', 'style'=>'margin-left:-10px; width:50px; border-radius:0;'))}}
		   		<div id="label">
				    {{Form::checkbox('private',1,false)}}
				    {{Form::label('Private Question')}}
				</div>
				<div id="IMG">
			    	<div class="dropdown">
			  			<button class="btn btn-infoo dropdown-toggle" type="button" data-toggle="dropdown" style="margin-top:39px;margin-right:250px;border-radius:0;">Upload Image!</button>
			  			<p class="dropdown-menu dropdown-menu-right" style="margin-right:100px;margin-top:-65px;background-color:rgba(0,0,0,0.6);	color:white;		
						height: 50px;
						padding: 20px;
						padding-top: 10px;
						padding-bottom: 5px;">
			   				{{Form::open(array('url'=>'upload','files'=>true))}}
							{{Form::file('image', array('multiple'=>false, 'style'=>'margin-bottom:20px'))}}
							{{Form::close()}}
						</p>
			  		</div>
			  	</div>
				{{Form::close()}}
				@if($message = Session::get('message'))
				{{$message}}
				@endif
			</div>
		@endif

		<div class="questionlist">
			@if(!$questions)
				<p>No Questions</p>
			@else

				<div class="tab-content" style="display: block;">
				<div role="tabpanel" class="tab-pane active" id="all">

				   


				</div>
				    <div role="tabpanel" class="tab-pane" id="date">

					</div> 
				    <div role="tabpanel" class="tab-pane" id="answered">
				    	

					</div>


					<div role="tabpanel" class="tab-pane" id="tags">
				    </div>

				</div>
		  		</div>			
			@endif
	 	</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>	


						
	    $('.arrow2').hide();
		$('.arrow3').hide();
		$('.arrow1').hide();
		$('.arrow0').show();

  $('#number0').click(function(){
	    $('.arrow2').hide();
		$('.arrow3').hide();
		$('.arrow1').hide();
		$('.arrow0').show();
});

	$('#number1').click(function() {
		$('.arrow0').hide();
		$('.arrow2').hide();
		$('.arrow3').hide();
		$('.arrow1').show();
});
	$('#number2').click(function() {
		$('.arrow0').hide();
		$('.arrow1').hide();
		$('.arrow3').hide();
		$('.arrow2').show();
});
	$('#number3').click(function() {
		$('.arrow0').hide();
		$('.arrow1').hide();
		$('.arrow2').hide();
		$('.arrow3').show();
});
		var y = {{ Tag::get()->count() }} ;
	var x = y / 2.5 * 120 ;
	$(".Tags a").css("height", x);

	var M = {{Tag::where('id', Tag::get()->count() + 1)->pluck('id')}} 
        $('.nothing input[type="checkbox"]').click(	function(){
        	var tagid = $(this).val();
       		for (i = 1; i <= M.length; i++){
            	if($(this).prop("checked") == true){
            		if(tagid == i){
            			var CCK = $(this).val();
            			var url ="home/Tagsajax";
                		$.ajax({
                			type: 'GET',
                			url: url,
                			cache:false,
                			data: {CCK:CCK},
                			success: function(data){
                				$('#tags').html(data);
                			},
                			error: function(){
                				console.log('something happend');
                			}
                		});
            		}
            	}
            }
        });
 /*============================pagination===================================*/
 // $(window).on('hashchange',function(){
	// 		page = window.location.hash.replace('#','');

	// 		getAll(page);
	// 	});
	// 	$('#all').on('click','.all .pagination a', function(e){
	// 		e.preventDefault();
	// 		var page = $(this).attr('href').split('all=')[1];

	// 		// getProducts(page);
	// 		location.hash = page;
	// 	});
	// 	function getAll(page){
	// 		$.ajax({
	// 			url: '/home/all?all=' + page
	// 		}).done(function(data){
	// 			$('#all').html(data);
	// 		});

	// 	}
	// 	$(window).on('hashchange',function(){
	// 		page = window.location.hash.replace('#','');

	// 		getByDate(page);
	// 	});
	// 	$('#date').on('click','.date .pagination a', function(e){
	// 		e.preventDefault();
	// 		var page = $(this).attr('href').split('date=')[1];

	// 		// getProducts(page);
	// 		location.hash = page;
	// 	});
	// 	function getByDate(page){
	// 		$.ajax({
	// 			url: '/home/date?date=' + page
	// 		}).done(function(data){
	// 			$('#date').html(data);
	// 		});

	// 	}
	$(function() {
    // 1.
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        var baseUrl = chunks[0];
        var querystr = chunks[1].split('&');
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                break;
            }
        }
        return pg;
    }
 
    // 2.
    $('#all').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
 
        $.ajax({
            url: '/home/all',
            data: { page: pg },
            success: function(data) {
                $('#all').html(data);
            }
        });
    });
 
    $('#date').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
 
        $.ajax({
            url: '/home/date',
            data: { page: pg },
            success: function(data) {
                $('#date').html(data);
            }
        });
    });
 
    $('#answered').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
 
        $.ajax({
            url: '/home/solved',
            data: { page: pg },
            success: function(data) {
                $('#answered').html(data);
            }
        });
    });
 
    // 3.
    $('#all').load('/home/all?page=1');
    $('#date').load('/home/date?page=1');
        $('#answered').load('/home/solved?page=1');

});
</script>
@stop