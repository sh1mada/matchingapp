<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Chat;

class UsersChatController extends Controller
{
    public function chat($id){
    $user = User::findOrFail($id);
    $users=$user->liked()->paginate(10);
    $messages=$user->get_messages($id,$users);
    return view('chat.chat',[
        'user' => $user,
        'users' => $users,
        'messages'=>$messages,
        ]);
    }
    
    public function chatroom($id,$friend_id){
        $user = User::findOrFail($id);
        $friend=User::findOrFail($friend_id);
        
        $messages=$user->get_messages($id,$friend_id);
        
       // $messages=$messages1->chat()->pivot()->orderBy('created_at')->get();
        
        return view('chat.chatroom',[
            'user' => $user,
            'friend'=>$friend,
            'messages'=>$messages,
            
        ]);
    }
    
    public function sendmessage(Request $request,$user_id, $friend_id){
        $message=$request->message;
        \Auth::user()->sendmessage($message,$friend_id);
        return back();
    }
    
    
}