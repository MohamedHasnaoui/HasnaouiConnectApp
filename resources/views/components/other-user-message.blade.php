@props(["sentTime"=>''])
<div class="p-3 max-w-64 break-words rounded-2xl border border-[#E2E8F0] shadow-sm font-medium rounded-bl-none text-[#1E293B] bg-white m-2 mr-auto w-fit ">{{ $slot}}
     <small class="text-xs ml-2 text-[#1e293b9e]">{{ $sentTime }} </small><img class="inline-block ml-auto" src="{{ asset("images/sentIcon.svg")}}" alt="sent"></div>