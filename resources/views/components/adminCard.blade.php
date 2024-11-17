@props(['name'=>'','profile_image'=> '','role'=>'','id'=>''])
<div class="flex flex-col p-6 w-[280px] gap-4 items-center bg-[#F8FAFC] rounded-xl shadow-sm h-fit" >
    <img class="border rounded-full h-[72px] w-[72px]" src="{{asset($profile_image)}}" alt="profile image">
    <div class="text-center">
        <p class="font-extrabold text-[18px]" >{{$name}}</p>
        <p class="text-[rgb(79,70,229)] font-semibold text-[16px]">{{$role}}</p>
    </div>
    <p class="text-[#475569] font-normal text-[16px] text-center">hi I am admin of HasnaouiConnect app don't hesitate to send me a message</p>
    <button id="SendMessageButton{{$id}}" class="text-white p-2 rounded-lg shadow-md bg-[#4F46E5]">Send a message</button>
    <form id="sendMessageForm{{$id}}" method="POST" action="{{route('sendMessage')}}" class="hidden relative" >
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <input id="inputMessage{{$id}}" name="message" type="text" class="w-full bg-no-repeat pr-11 bg-[0px_center] rounded-3xl border border-[#CBD5E1] shadow-md p-3 gap-4 " placeholder="Write your message...">
        <button id="sendMessageButt{{$id}}" class="hidden absolute right-5 top-[25%]" type="submit"><img src="{{asset('images/sendIcon.svg')}}" alt=""></button>    
    </form>
    <button id="cancelButt{{$id}}" class="hidden text-white p-2 ml-2 rounded-lg self-start shadow-md bg-[#4F46E5]">Cancel</button>
</div>
<script>
    let cancelButt{{$id}} = document.getElementById("cancelButt{{$id}}");
    let elm{{$id}}=document.getElementById("SendMessageButton{{ $id }}");
    elm{{$id}}.onclick=()=>{
        document.getElementById("sendMessageForm{{$id}}").classList.remove('hidden');
        elm{{$id}}.classList.add('hidden');
        cancelButt{{$id}}.classList.remove('hidden');
    }
    let inputMessage{{$id}} = document.getElementById('inputMessage{{$id}}');
    let sendMessageButt{{$id}} = document.getElementById('sendMessageButt{{$id}}');
    inputMessage{{$id}}.oninput=()=>{
    if(inputMessage{{$id}}.value.trim()===''){
        sendMessageButt{{$id}}.classList.add('hidden');
    }else{
        sendMessageButt{{$id}}.classList.remove('hidden');
    }  
}
cancelButt{{$id}}.onclick = ()=>{
        document.getElementById("sendMessageForm{{$id}}").classList.add('hidden');
        cancelButt{{$id}}.classList.add('hidden');
        elm{{$id}}.classList.remove('hidden');
    }

    $('#sendMessageButt{{$id}}').click(function (e) { 
            e.preventDefault();
            if($('#inputMessage{{$id}}').val().trim()!==''){
            $.ajax({
              type: "POST",
              url: "{{route('sendMessage')}}",
              data: {
              id: {{$id}},
              message: $('#inputMessage{{$id}}').val(),
               _token: '{{ csrf_token() }}'
              },
              success: function (response) {
                localStorage.setItem('chatButtonId', 'chatButt{{$id}}');
                window.location.href = "{{route('dashboard')}}";
                
              }
            });
            }
          });  
</script>