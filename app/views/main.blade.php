<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') 
  @if(isset($title))
  {{ $title }}
  @endif
  </title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css"href="{{ asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css"href=" {{ asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css"href="{{ asset('css/main.css') }}">
<link rel="stylesheet" type="text/css"href="{{ asset('css/social-sharing.css') }}">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src=" {{ asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="//js.pusher.com/2.2/pusher.min.js"></script>
    <script type="text/javascript" src=" {{ asset('js/bootstrap.min.js')}}"></script>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrapbing.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/jquery.typeahead.css')}}">
    
    <style>
       .dropdown img
       {
          border-radius: 50%;

       }
       body{
        font-family: 'Handlee', cursive;
       }
       .modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}
 body.loading {
    overflow: hidden;   
}
body.loading .modal {
    display: block;
}      
    </style>
@section('header')

@show
  <style>
    #notify {
      background-color: orange;
      color: white;
      padding: 2px 20px;
      text-decoration: none;
      border-radius: 4px 4px 0 0;

    }


  </style>
</head>
<body>
    <!-- header section -->


  <div class="container">
      <div class="row">

          	<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="#">
                  <img alt="Brand" src="{{ asset('images/logo2.png') }}" width="31" height="35" id="logo">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li >{{ HTML::linkRoute('others_questions', 'Home') }}</li>
                @if(Auth::User()->iFadmin != 1)
                <li>{{ HTML::linkRoute('your_questions', 'Your Questions') }}</li>
                <li>
    <a href="#" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Notificatin
    </a>
    <ul class="dropdown-menu" aria-labelledby="dLabel">
      <?php $new = Usernotification::where('user_id',Auth::User()->id)->where('is_read',0)->get(); ?>
      @if(count($new)!=0)
        <?php 
        foreach ($new as $notification) {
            echo "<li style=\"background-color:#e9eaed;\"> <a href=\"/home/answernotify\">Your Question: ";
            $question_id = $notification->question_id;
            echo "<strong>";
            echo Question::where('id',$question_id)->get()->first()->question;
            echo "</strong>";
            echo " Has Been Answered";
            echo "</a></li>";
        }
        ?>
        @else
        <?php $old = Usernotification::where('user_id',Auth::User()->id)->where('is_read',1)->get();
          foreach ($old as $notification) {
            echo "<li> <a href=\"/home/answernotify\">Your Question: ";
            $question_id = $notification->question_id;
            echo "<strong>";
            echo Question::where('id',$question_id)->get()->first()->question;
            echo "</strong>";
            echo " Has Been Answered";
            echo "</a></li>";
        }
         ?>
      @endif
    </ul>
  </li>

                @elseif(count(Notification::unread())===0)
                  <li id="old">{{ HTML::linkRoute('notifications', 'notifications (0)') }}</li>
                      <li>{{ HTML::linkRoute('tags', 'Your Tags') }}</li>
                @else
                  <li id="notify">{{ HTML::linkRoute('notifications', "notifications (".Notification::unread()->count().")") }}</li>
                      <li>{{ HTML::linkRoute('tags', 'Your Tags') }}</li>
                @endif


               
              </ul>
              {{ Form::open( array('url'=> 'search', 'class'=>'navbar-form navbar-left' ))}}
              

                {{ Form::token() }}
                <div class="typeahead-container">
                    <div class="typeahead-field">

                        <span class="typeahead-query">
                            <input id="keyword"
                                   name="keyword"
                                   type="search"
                                   autofocus
                                   autocomplete="off"
                                   >
                        </span>
                        <span class="typeahead-button">
                            <button class="btn btn-default" type="submit">
                                <span class="typeahead-search-icon"></span>
                            </button>
                        </span>

                    </div>
                </div>
                <div class="modal"><!-- Place at bottom of page --></div>
                {{ Form::close() }}
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php
                  //echo Auth::user()->username;
                  $hashed_mail=md5( strtolower( trim( Auth::user()->email)));
                  $grav_url = "http://www.gravatar.com/avatar/" .$hashed_mail;

                        ?>
                        <img src="<?php echo $grav_url; ?>" hieght="40px" width="40px">
                        <?php echo Auth::user()->username;?>
                         <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li>{{ HTML::linkRoute('edit', 'Edit') }}</li>
                    <li>{{ HTML::linkRoute('logout', 'Logout') }}</li>
                    
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
    </nav>

  </div>
      @yield('content')



      </div>
    <footer class="section section-primary" >
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>© Copyright <?php echo date('Y');?></p>
          </div>
          <div class="col-sm-6">
            <p class="text-info text-right">
              <br>
              <br>
            </p>
            <div class="row">
              <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 hidden-xs text-right">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <script type="text/javascript"src="{{asset('js/jquery.typeahead.js')}}"></script>
    <script type="text/javascript"src="{{asset('js/jquery.typeahead.min.js')}}"></script>
    <script >
        $('#keyword').typeahead({
            dynamic: true,
            delay: 800,
            hint: true,
            minLength: 1,
            maxItem: 15,
            order: "asc",
            group: true,
            maxItemPerGroup: 3,
            dropdownFilter: "all Search criteria",
            emptyTemplate: 'No result found',
            source: {
                questions:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "question"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
              user_questions:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "user_question"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
              unsolved:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "unsolved"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
              date:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "date"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
              before_date:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "before_date"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
              after_date:{
                    display: "questionvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "after_date"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.question"]
            },
            answer:{
                    display: "answervalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "answer"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.answer"]
            },
            tag:{
                    display: "tagvalue",
                    href: function (item) {
                        return item.href;
                    },
                    url: [{
                    type: "POST",
                    url: "http://localhost:8000/results/{all?}",
                    data: {
                        query: function () { return $('#keyword').val(); },
                        type: "tag"
                    },
                    callback: {
                        done: function (data, textStatus, jqXHR) {
                            return data;
                        },
                        fail: function (jqXHR, textStatus, errorThrown) {},
                        complete: function (jqXHR, textStatus) {},
                        always :function (data, textStatus, jqXHR) {}
                    }
                }, "querydata.tag"]
            }
            },
            callback: {
                onClickAfter: function (node, a, item, event) {
                    {
                        window.open(item.href);
                    }

                },
                onSendRequest: function(node,query)
                {
                    $body = $("body");
                    $body.addClass("loading");
                },
                onReceiveRequest: function(node,query)
                {
                    $body = $("body");
                    $body.removeClass("loading");
                }
            },
            debug: true
        });



//created at:
function time_ago(time){
  switch (typeof time) {
      case 'number': break;
      case 'string': time = +new Date(time); break;
      case 'object': if (time.constructor === Date) time = time.getTime(); break;
      default: time = +new Date();
  }
  var time_formats = [
      [60, 'seconds', 1], // 60
      [120, '1 minute ago', '1 minute from now'], // 60*2
      [3600, 'minutes', 60], // 60*60, 60
      [7200, '1 hour ago', '1 hour from now'], // 60*60*2
      [86400, 'hours', 3600], // 60*60*24, 60*60
      [172800, 'Yesterday', 'Tomorrow'], // 60*60*24*2
      [604800, 'days', 86400], // 60*60*24*7, 60*60*24
      [1209600, 'Last week', 'Next week'], // 60*60*24*7*4*2
      [2419200, 'weeks', 604800], // 60*60*24*7*4, 60*60*24*7
      [4838400, 'Last month', 'Next month'], // 60*60*24*7*4*2
      [29030400, 'months', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
      [58060800, 'Last year', 'Next year'], // 60*60*24*7*4*12*2
      [2903040000, 'years', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
      [5806080000, 'Last century', 'Next century'], // 60*60*24*7*4*12*100*2
      [58060800000, 'centuries', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
  ];
  var seconds = (+new Date() - time) / 1000,
      token = 'ago', list_choice = 1;

  if (seconds == 0) {
      return 'Just now'
  }
  if (seconds < 0) {
      seconds = Math.abs(seconds);
      token = 'from now';
      list_choice = 2;
  }
  var i = 0, format;
  while (format = time_formats[i++])
      if (seconds < format[0]) {
          if (typeof format[2] == 'string')
              return format[list_choice];
          else
              return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
      }
  return time;
}
  var G = {{Question::get()->count()}};
  var Q = {{Question::get(['created_at'])}};
  for(i = 1; i <= G; i++)
  {
    var unique = "#" + i;
    $(unique).append(time_ago(Q[i-1].created_at));  
  }


    </script>


  <!-- footer section -->  
</body>
</html>
