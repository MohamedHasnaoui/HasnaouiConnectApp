@props(['name'=>'','profile_picture'=>'','id'=>'','friendId'=>'','time'=>'','state'=>'','notif'=>''])

    <button id="chatButt{{$friendId}}" class="w-full border-b  border-[#E2E8F0]">
    <div class="flex items-center  w-full p-4">
      <div class="rounded-full border border-black h-12 w-12 m-1">
        <img  src="{{$profile_picture}}" class="h-12 w-12 rounded-full block border" alt="image">
      </div>
      <div class="flex flex-col text-start ml-2">
        <p  class="font-bold text-lg">{{$name}}</p>
        <div class="flex justify-between items-center">
        <small>{{$state}}</small>        
        @if ($notif)
        <div class='text-green-500 ml-7 mx-auto items-end'>new message!</div>
        @endif
        </div>
      </div>

      <div class="ml-auto  mr-1">
        <small>{{$time}}</small>

      </div>

    </div>
  </button>
</form>
<script>
    $(function(){ 
      let interval;
      $("#chatButt{{$friendId}}").click(function (e) {
                $('#Cover').addClass('hidden');
                $('#sendMBut').html('');
                $('#PageMessages').hide();
                $('#LoadingMessages').show();
                const navElement = document.getElementById("nav");
                if(window.innerWidth<1024 && navElement){
                    document.getElementById("listOfFriends").classList.add('sm:hidden');
                    document.getElementById("discussion").classList.replace('hidden','flex');
                    navElement.classList.add('hidden');
                }
       $.ajax({
        type: "GET",
        url: "{{route('Loadconversation')}}",
        data: {
          friendId: {{$friendId}},
          id: {{$id}}
        },
        success: function (response) {
          $('#discussion').show();
          $('#PageMessages').show();
          let script =( `<script>
              function updateScroll(pos) { 
                  $('#messages').scrollTop(pos);
              }

                
              interval = setInterval(() => {
              $.ajax({
                type: "GET",
                url: "{{ route('unseenMessages') }}",
                data: {
                  friendId: {{ $friendId }},
                  id: {{ $id }}
                },
                success: function(response) {
                  if(response!=''){
                    $('#messages').append(response);
                    updateScroll($('#messages').scrollTop()+238);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  console.error("AJAX error:", errorThrown);
                }
              });
            }, 1000);
            $('#goBackButt').click(function (e) { 
            console.log('back');
            $('#nav').removeClass('hidden');
            document.getElementById("listOfFriends").classList.remove('sm:hidden')
            $('#discussion').hide();
            clearInterval(interval);
            }); 
        `);

          $('#PageMessages').html(response+script);
          $('#sendMBut').html(`<form method="POST" action="" class="relative">
            <input type="hidden" name="id" value="">
            <input id="inputMessage" name="message" type="text" class="w-full bg-[url({{asset('images/addMessageIcon.svg')}})] bg-no-repeat pl-9 pr-11 bg-[0px_center] rounded-full border border-[#CBD5E1] shadow-md p-3 gap-4 " placeholder="Write tour message...">
            <button id="sendMessageButt" class="hidden absolute right-5 top-[25%]" type="submit"><img src="{{asset('images/sendIcon.svg')}}" alt=""></button>
          </form>
          <script>
          document.getElementById('inputMessage').oninput=()=>{
              if(document.getElementById('inputMessage').value.trim()===''){
                  document.getElementById('sendMessageButt').classList.add('hidden');
              }else{
                  document.getElementById('sendMessageButt').classList.remove('hidden');
              }
          } 
          $('#sendMessageButt').click(function (e) { 
            e.preventDefault();
            if($('#inputMessage').val().trim()!==''){
            $.ajax({
              type: "POST",
              url: "{{route('sendMessage')}}",
              data: {
              id: {{$friendId}},
              message: $('#inputMessage').val(),
               _token: '{{ csrf_token() }}'
              },
              success: function (response) {
                $('#messages').append(response);
                $('#inputMessage').val('');
                updateScroll($('#messages').prop('scrollHeight'));
                document.getElementById('sendMessageButt').classList.add('hidden')
              }
            });
            }
          });    
          `)
          $('#LoadingMessages').hide();
          $(function () { 
          updateScroll($('#messages').prop('scrollHeight')); })
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.error("AJAX error:", errorThrown);
        }
       });
      });
     })
</script>
