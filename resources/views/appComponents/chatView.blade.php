@extends('dashboard')
@section('mainContent')
@php
    use Carbon\Carbon;
    $now = Carbon::now();
@endphp
<aside  id="listOfFriends" class="fixed lg:block inset-0 z-50 h-full w-full left-0 lg:w-96 rounded-s transition-transform duration-300 lg:left-80 ">
    <div class="py-6 px-4">
      <div class="flex"> 
        <img src="images/chatIcon.svg" alt="chat">
        <h1 class="font-extrabold text-3xl ml-2">My Chats</h1>
      </div>
    </div>
    <div id='myConversations' class=" overflow-scroll border-t border-[#E2E8F0] h-full">
      <div id='LoadingConv' class="z-[100] bg-[#F8FAFC] w-full h-full flex items-center justify-center">
      <img class="w-28" src="{{asset('images/LoadingIcon.gif')}}" alt="" srcset="">
    </div>
    </div>
    <div></div>
  </aside>
  <div id='discussion' class="bg-[#F8FAFC] fixed inset-0 z-50 h-full hidden lg:flex flex-col lg:w-[calc(100vw-704px)] rounded-s transition-transform duration-300 lg:left-[704px] ">
    <div id='LoadingMessages' class="z-[100] bg-[#F8FAFC] w-full h-full flex items-center justify-center">
      <img class="w-28" src="{{asset('images/LoadingIcon.gif')}}" alt="" srcset="">
    </div>
    <div id="Cover" class="flex w-full h-full items-center justify-center">
        <p class="font-semibold text-xl border rounded-md border-[#4F46E5] p-5 text-center bg-white shadow-md">Welcome to <span class="font-bold text-[#4F46E5]">HasnaouiConnect</span> <br /><span class="text-[#4e46e5c2]">Start chating now</span></p>
    </div>
    <div class=" p-0 m-0" id="PageMessages">

    </div>
    <div id="sendMBut" class="p-6">
      
    </div>
  </div>
  <div>
    
    </div> 
</div>  
<script>
  $('#LoadingMessages').hide();
  setInterval(() => {
    $.ajax({
    type: "Get",
    url: "getConversations",
    data: "",
    success: function (response) {
      $('#myConversations ').html(response);
    }
  });
  }, 1000);

</script>
@endsection
