@foreach ($messages as $message)
<x-other-user-message sentTime="{{$message->created_at->format('H:i')}}">{{$message->message_text}}</x-other-user-message>
@endforeach