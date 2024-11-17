
@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $lastSeen=Carbon::parse($friend->last_seen_at);
    $diffTime= $lastSeen->diffInMinutes($now);
    if($diffTime<=2){
      $state="online now";
    }else $state=$lastSeen->diffForHumans();
@endphp
<div class="w-full">
    <div class="flex items-center border-b border-[#CBD5E1] bg-[#F1F5F9] w-full py-4 px-6">
      <div class=" rounded-t-full rounded-full border h-12 w-12 m-1">
        <img src="{{$friend->profile_picture}} " class="block" alt="image" />
      </div>
      <div class="flex flex-col text-start ml-2">
        <p  class="font-bold text-lg">{{$friend->name}}</p>
        <small>{{$state}}</small>
      </div>
      <button id="goBackButt" class="ml-auto text-3xl text-gray-500 p-3 lg:hidden">↞</button>
    </div>
  </div>
  <div id='messages' class="overflow-y-scroll h-[calc(100vh-200px)] flex flex-col grow mb-0">
    <div class="mt-auto">
      @foreach ($messages as $message)
          @if($message->sender_Id==Auth::id())
            <x-my-message sentTime="{{$message->created_at->format('H:i')}}">{{$message->message_text}} </x-my-message>
          @else
            <x-other-user-message sentTime="{{$message->created_at->format('H:i')}}">{{$message->message_text}}</x-other-user-message>
          @endif
      @endforeach
    </div>
  </div>
</div>
<script>

</script>
  
