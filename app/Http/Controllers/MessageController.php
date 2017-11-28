<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Message;
use Validator;
use App\Events\MessagePosted;
class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessage()
    {
    
        return Message::with('user')->get();
    }
    
    public function postMessage(Request $request)
    {
        //getting current user data
        $user =Auth::user();
        
        $user_id = $user->id;
        //echo "User Id ". $user_id;

        $message = new Message();
        $message->message = $request->input('message');
        $message->user_id = $user_id;

        $message->save();
        //echo "Hello World";

        //annouce a new message has been posted using events and event broadcasts
        event(new MessagePosted($message));

        return Message::with('user')->get();
        //testing to seeing if user data returned
        //return $user;
    }
}
