@props(["sentTime"=>''])
<div class="p-3 max-w-56 h-fit overflow-clip break-words rounded-2xl font-medium rounded-br-none text-white bg-[#4F46E5] ml-auto w-fit m-2">{{ $slot}}
     <small class="text-xs ml-2 text-[#ffffffa6]">{{ $sentTime }} </small><img class="inline" src="{{ asset("images/sentIcon.svg")}}" alt="sent"></div>