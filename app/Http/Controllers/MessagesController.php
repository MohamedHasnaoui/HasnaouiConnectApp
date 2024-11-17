<?php

namespace App\Http\Controllers;

use App\Models\conversations;
use App\Models\messages;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function sendMess(Request $request){
        $user_ids=[$request->id , Auth::id()];
        $conversation = conversations::whereIn('user1_id',$user_ids)->whereIn('user2_id',$user_ids)->first();
        if(!$conversation){
            conversations::create([
                'user1_id' => $request->id ,
                'user2_id' => Auth::id()
            ]);
            $conversation = conversations::whereIn('user1_id',$user_ids)->whereIn('user2_id',$user_ids)->first();
        }
        messages::create([
            'conversation_id'=>$conversation->id,
            'sender_id'=>Auth::id(),
            'message_text'=>$request->message
        ]);
        $conversation->updated_at = Carbon::now();
        $conversation->save();

        return (
            "<div class='p-3 max-w-56 rounded-2xl font-medium rounded-br-none text-white bg-[#4F46E5] ml-auto w-fit m-2'>".$request->message.
     "<small class='text-xs ml-2 text-[#ffffffa6]'>".Carbon::now()->format('H:i'). "</small><img class='inline' src='images/sentIcon.svg' alt='sent'></div>"
        );
    }
}
