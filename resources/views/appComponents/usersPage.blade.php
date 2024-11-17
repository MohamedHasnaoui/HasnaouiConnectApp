@extends('dashboard')
@section('mainContent')
<div class=" h-full lg:overflow-scroll">
<div class="p-4 flex  bg-white gap-4 flex-wrap justify-around ">
    @if (Auth::id()!=1)
        <x-adminCard id="1" name="Mohamed El Hasnaoui" role="Admin" profile_image="{{asset('images/1803238238705776.jpg')}}"></x-adminCard>
    @endif
    
    @foreach($list_users as $user)
        @if ($user->id != Auth::id() && $user->id!=1)
            <x-userCard id="{{$user->id}}" name="{{$user->name}}" role="Basic member" profile_image="{{$user->profile_picture}}"></x-userCard>
        @endif
    @endforeach
    </div>
   <div class="self-end w-52 my-4 mx-auto"> {{ $list_users->links() }}</div>
    </div>
@endsection