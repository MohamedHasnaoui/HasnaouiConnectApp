<?php

namespace App\Http\Controllers;

use App\Models\conversations;
use App\Models\messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
    public function handleConversation(Request $request){
        $messages = messages::where('conversation_id',$request->id)->orderBy('created_at')->get();
        $friend=User::find($request->friendId);
        foreach ($messages as $message) {
            if($message->sender_Id != Auth::id()){
                $message->seen = true;
                $message->save();
            }
        }
        return view('appComponents.messagesView',compact('messages','friend'));
    }
    public function diplayConversation(){
        $messages = session('messages');
        $friend = session('friend');
        if($messages && $friend){
            return view('appComponents.messagesView',compact('messages','friend'));
        }
        return redirect()->route('dashboard');
    }
    public function getUnseenMessages(Request $request)
    {
        $messages = messages::where('conversation_id',$request->id)->where('sender_Id',$request->friendId)->where('seen',false)->orderBy('created_at')->get();
        foreach ($messages as $message) {
            $message->seen = true;
            $message->save();
        }
        return view('appComponents.messages',compact('messages')) ;
    }
    public function getConversations(){
    $myConversation = conversations::where('user1_id',Auth::id())->orWhere('user2_id',Auth::id())->orderBy('updated_at', 'desc')->get();
    
    return view('appComponents.conversations',compact('myConversation')) ;
    }
}
