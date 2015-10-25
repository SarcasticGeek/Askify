@extends('main')
<style>
    .notificationlist ul{
        text-align: left;
        background-color: lightgray;
        border-radius:5px;
        margin:-13px;

        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .unread ul{
        text-align: left;
        background-color: orange;
        border-radius:5px;
        margin:-13px;

        margin-top: 10px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    #empty{
        text-align: left;
        border-radius:5px;
        margin:-13px;

        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .notification{
        margin-bottom:200px;
    }

</style>
@section('content')
    <div class="notification">
    <h1>New Notifications</h1>
    <div class="unread">
        <?php $notifications=Usernotification::where('user_id',Auth::User()->id)->where('is_read',0)->get();?>
        @if(count($notifications)===0)
            <p id="empty">No new Notifications</p>
        @else
            @foreach($notifications as $notification)
                <ul>
                    <?php $question = Question::where('id',$notification->question_id)->get()->first()->question;
                        $answer = Answer::where('id',$notification->answer_id)->get()->first()->answer;
                    ?>
                    <p ><strong>Your Question: <?php echo $question?></strong> Has Been Answered: <?php echo $answer ?> </p>
                </ul>
            @endforeach
        @endif
    </div>
    <h1>Older Notifications</h1>
    <div class="notificationlist">
        <?php $older=Usernotification::where('user_id',Auth::User()->id)->where('is_read',1)->get();?>
        @if(count($older)===0)
            <p id="empty">No old Notifications</p>
        @else
            @foreach($older as $notification)
                <ul>
                    <?php $question = Question::where('id',$notification->question_id)->get()->first()->question;
                        $answer = Answer::where('id',$notification->answer_id)->get()->first()->answer;
                    ?>
                    <p ><strong>Your Question: <?php echo $question?></strong> Has Been Answered: <?php echo $answer ?> </p>
                </ul>
            @endforeach
        @endif
    </div>
    
    </div>
@endsection