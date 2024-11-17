
@php
    use Carbon\Carbon;
    use App\Models\messages;
    $now = Carbon::now();

@endphp
    @if (!count($myConversation))
        <div class="p-5 w-full h-full flex justify-center relative">
          <p class="text-center absolute top-1/4 block w-fit mx-auto">it seems that you are new here <br><a class="text-[#4F46E5] font-bold" href="{{route('users')}}">start a conversation now!</a> </p>
        </div>
    @endif
      @foreach ($myConversation as $conversation)
          @php
            $lastMessage = messages::where('conversation_id',$conversation->id)->latest()->first();
            $isthereNotif = false;
            if($lastMessage->sender_Id!=Auth::id() && !$lastMessage->seen)
                $isthereNotif=true;
            $id=0;
            $convID = $conversation->id;
            if($conversation->user1_id != Auth::id()){
              $id=$conversation->user1_id;
            }else{
              $id=$conversation->user2_id;
            }
            $user = Illuminate\Foundation\Auth\User::find($id);      
            $lastSeen=Carbon::parse($user->last_seen_at);
            $diffTime= $lastSeen->diffInMinutes($now);
            if($diffTime<=2){
              $state="online now";
            }else $state=$lastSeen->diffForHumans(); 
          @endphp
      <x-freindUsers notif="{{$isthereNotif}}" profile_picture="{{$user->profile_picture}}" time="{{$conversation->updated_at->format('H:i')}} " friendId={{$id}} id={{$convID}} name="{{$user->name}}"
         state="{{$state}}"></x-freindUsers>
      @endforeach