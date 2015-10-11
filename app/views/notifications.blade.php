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
        margin-bottom:100px;
    }

</style>
@section('content')
    <div class="notification">
    <h1>New Notifications</h1>
    <div class="unread">
        @if(count($notifications)===0)
            <p id="empty">No new Notifications</p>
        @else
            @foreach($notifications as $notification)
                <ul>


                    <p ><strong>{{ucfirst($notification->user->username)}}</strong> asked a new {{ HTML::linkRoute('question','Question',$notification->question_id) }}</p>

                </ul>
            @endforeach
            {{ $notifications->links()}}
        @endif
    </div>

    <h1>Older Notifications</h1>
    <div class="notificationlist">
        @if(count($older)===0)
            <p id="empty">No old Notifications</p>
        @else
            @foreach($older as $notification)
                <ul>


                    <p ><strong>{{ucfirst($notification->user->username)}}</strong> asked a new {{ HTML::linkRoute('question','Question',$notification->question_id) }}</p>

                </ul>
            @endforeach
            {{ $older->links()}}
        @endif
    </div>
    </div>
@endsection