<?php
class ConfirmationController extends BaseController{
    public function confirmationState($confirmationCode)
    {
        
        
        $users = DB::table('users')->get();
        $found = false;
        $auth = false;
        $message = '';
        foreach ($users as $user)
		{
			if($user->confirmationcode == $confirmationCode)
            {
                $found = true;
                DB::table('users')
                ->where('username', $user->username)
                ->update(array('confirmationcode' => '','confirmed'=>true));
                $userx =  DB::table('users')
                ->where('username', $user->username);
                $userx = User::find($user->id);
                Auth::login($userx);
            }
        }
        if(!$found) $message = 'Sorry, Couldn\'t find a  username to match this confirmation code';
        else if(Auth::check()) $message = 'Confirmation Successfull';
        $data['message'] = $message;
        return View::make('emailconf',$data);
    }
     public function postConfirmation()
     {
         $message = 'Auth unsuccessfull';
         $data['message'] = $message;
         if(Auth::check())
             return Redirect::intended('/home');
         else
             return View::make('emailconf',$data);
     }
}