<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search View</title>

    <!-- Bootstrap Core CSS -->
    <link  rel="stylesheet" type="text/css"href= "{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.typeahead.css')}}">

    <!-- Custom CSS -->
    <link  rel="stylesheet"type="text/css"href= "{{ asset('css/scrolling-nav.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style >
body{
    text-align: center;

}
.section-primary
{

    position: relative;bottom: -280px

}
.user_questionlist ul{
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
.questionlist ul{
        text-align: left;
        background-color: #ffffff;
        border-radius:5px;
        margin:-13px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
}
.answerlist ul{
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
.unsolvedlist ul{
        text-align: left;
        background-color: #ffffff;
        border-radius:5px;
        margin:-13px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
}
.datelist ul{
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
.beforelist ul{
        text-align: left;
        background-color: #ffffff;
        border-radius:5px;
        margin:-13px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
}
.afterlist ul{
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
.taglist ul{
        text-align: left;
        background-color: #ffffff;
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
h1 {
            font-size: 32px;
            margin: 16px 0 0 0;
            color: #494949;
        }
        img{
            
            margin-left: -40px;
            margin-top: -10px;
        }
        .dropdown img
       {
          border-radius: 50%;
          margin-left: -120px;
          margin-top: -5px;


       }
       .dropdown.dropdown-menu ul{
        margin-left: -1000px;
       }

.navbar-form.navbar-left{
    margin-top: -10px;
    margin-left: -10px;


}
.btn-primary{
    margin-left: 20px;
}
.form-control{
    width: 500em;
}
    

.navbar-nav {
    margin-top: -20px;
    margin-left: 35px;
}
.navbar-brand.page-scroll{
    margin-top: -13px;
}
.navbar-nav.navbar-right ul
{
position: absolute;z-index: -999;

}
.navbar-default.navbar-fixed-top
{
    width: 850px;
    margin-left: 200px;
}
       
</style>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">




<div class="container">
  <div class="row">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                @if(isset($keyword))
                {{ Form::text('keyword', '', array('id'=>'keyword' ,'class'=>'form-control','placeholder'=>$keyword)) }}
                @else
                {{ Form::text('keyword', '', array('id'=>'keyword' ,'class'=>'form-control','placeholder'=>'Click to search!')) }}                
                @endif
                {{ Form::submit('Find',array('class'=>'btn btn-primary' )) }}


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
              





    </nav>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
        <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Username</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#question">Question</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#answer">Answer</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#unsolved">Unsolved</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#date">Date</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#before">Before</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#after">After</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#tag">Tag</a>
                    </li>
                    <li>
                        {{ HTML::linkRoute('others_questions', 'Home') }}
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        
        <!-- /.container -->
    </div>



    </nav>
    </div>


    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
        
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By Username</h1>
                    <div class="user_questionlist">
                    </form>
                        @if(isset($user_questions))
                            @if(count($user_questions)=== 0) 
                                <p>Nothing found,please try a different search.</p>
                            @else
                                <ul>
                                    @foreach($user_questions as $question_) 
                                        <li>
                                            {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                                            by {{ ucfirst($question_->user->username) }}
                                        </li>
                                    @endforeach
                                </ul>
                            {{Paginator::setPageName('page_userquestions')}}
                            {{$user_questions
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#question">Next</a>
                </div>
            </div>
        </div>
        
    </section>


    <!-- About Section -->
    <section id="question" class="question-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By Question</h1>
                    <div class="questionlist">
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
                                {{Paginator::setPageName('page_questions')}}
                            {{$questions
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#answer">Next</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="answer" class="answer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By Answer</h1>
                    <div class="answerlist">
                    </form>
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
                                {{Paginator::setPageName('page_answers')}}
                            {{ $answers
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#unsolved">Next</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="unsolved" class="unsolved-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By Unsolved Questions</h1>
                    <div class="unsolvedlist">
                    </form>
                        @if(isset($unsolved_questions))
                            @if(count($unsolved_questions)=== 0) 
                                <p>Nothing found,please try a different search.</p>
                            @else
                                <ul>
                                    @foreach($unsolved_questions as $question_) 
                                        <li>
                                            {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                                            by {{ ucfirst($question_->user->username) }}
                                        </li>
                                    @endforeach
                                </ul>
                            {{Paginator::setPageName('page_unsolved')}}
                            {{$unsolved_questions
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#date">Next</a>
                </div>
            </div>
        </div>
    </section>

    <!-- date Section -->
    <section id="date" class="date-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By a certain Date</h1>
                    <div class="datelist">
                    </form>
                        @if(isset($date_questions))
                            @if(count($date_questions)=== 0) 
                                <p>Nothing found,please try a different search.</p>
                            @else
                                <ul>
                                    @foreach($date_questions as $question_) 
                                        <li>
                                            {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                                            by {{ ucfirst($question_->user->username) }}
                                        </li>
                                    @endforeach
                                </ul>
                            {{Paginator::setPageName('page_date')}}
                            {{$date_questions
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#before">Next</a>
                </div>
            </div>
        </div>
    </section>

    <!-- before Section -->
    <section id="before" class="before-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search Before a Certain Date</h1>
                    <div class="beforelist">
                    </form>
                        @if(isset($before_questions))
                            @if(count($before_questions)=== 0) 
                                <p>Nothing found,please try a different search.</p>
                            @else
                                <ul>
                                    @foreach($before_questions as $question_) 
                                        <li>
                                            {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                                            by {{ ucfirst($question_->user->username) }}
                                        </li>
                                    @endforeach
                                </ul>
                            {{Paginator::setPageName('page_before')}}    
                            {{$before_questions
                                ->appends('page_after', Input::get('page_after',1))
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#after">Next</a>
                </div>
            </div>
        </div>
    </section>

    <!-- after Section -->
    <section id="after" class="after-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search After a Certain Date</h1>
                    <div class="afterlist">
                    </form>
                        @if(isset($after_questions))
                            @if(count($after_questions)=== 0) 
                                <p>Nothing found,please try a different search.</p>
                            @else
                                <ul>
                                    @foreach($after_questions as $question_) 
                                        <li>
                                            {{ HTML::linkRoute('question', $question_->question, $question_->id) }}
                                            by {{ ucfirst($question_->user->username) }}
                                        </li>
                                    @endforeach
                                </ul>
                            {{Paginator::setPageName('page_after')}}
                            {{$after_questions
                                ->appends('page_tags', Input::get('page_tags',1))
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#tag">Next</a>
                </div>
            </div>
        </div>
    </section>
    <section id="tag" class="tag-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Search By Tag</h1>
                    <div class="taglist">
                    </form>
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
                            {{Paginator::setPageName('page_tags')}}    
                            {{ $tags
                                ->appends('page_userquestions', Input::get('page_userquestions',1))
                                ->appends('page_questions', Input::get('page_questions',1))
                                ->appends('page_answers', Input::get('page_answers',1))
                                ->appends('page_unsolved', Input::get('page_unsolved',1))
                                ->appends('page_date', Input::get('page_date',1))
                                ->appends('page_before', Input::get('page_before',1))
                                ->appends('page_after', Input::get('page_after',1))
                                ->links()}}
                            @endif
                        @endif
                    </form>
                    </div>
                    <a class="btn btn-info page-scroll" href="#page-top">Back to Top</a>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script type="text/javascript"src=" {{ asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript"src=" {{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Scrolling Nav JavaScript -->
    <script type="text/javascript"src=" {{ asset('js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript"src=" {{ asset('js/scrolling-nav.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/maintainscroll.jquery.min.js')}}"></script>
    <script type="text/javascript"src="{{asset('js/jquery.typeahead.js')}}"></script>
    <script type="text/javascript"src="{{asset('js/jquery.typeahead.min.js')}}"></script>

</body>

</html>
