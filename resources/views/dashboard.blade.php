
<!DOCTYPE html>
<html data-bs-theme="auto" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{asset('images/icon.jpg')}}" type="image/x-icon">
        <!-- Fonts -->
        
        <title>HasnaouiConnect</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/sideBar.css')}}">
        <link rel="stylesheet" href="css/app.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="{{ asset('js/sendMessage.js')}}"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
      <!-- component -->
      <nav id='nav' class=" block lg:block relative w-full z-[60] max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
        <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
          <div class="capitalize">
          </div>
          <div class="flex items-center">
            <div class="mr-auto md:mr-4 md:w-56">
            </div>
            <button id="openMenu" class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 grid lg:hidden" type="button">
              <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" stroke-width="3" class="h-6 w-6 text-blue-gray-500">
                  <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                </svg>
              </span>
            </button>
          </div>
        </div>
      </nav>
<div class="flex h-full">
  @include('appComponents.sideBar')
  <div class="lg:fixed lg:left-80 lg:w-[calc(100vw-320px)] h-full mx-auto">
      @yield('mainContent')
  </div>
  <div id='backgroundDark' class="fixed top-0 left-0 hidden w-lvw h-lvh z-[65] lg:hidden bg-[#00000050]"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sendMessage.js') }}"></script>
    </body>
</html>
<script>
        function onWindowResize() {
            const navElement = document.getElementById("nav");
            const friendsListElement = document.getElementById("listOfFriends");

            if (window.innerWidth < 1024) {
                if (friendsListElement.classList.contains('sm:hidden')) {
                    navElement.classList.add('hidden');
                } else {
                    navElement.classList.remove('hidden');
                }
            }
        }

        window.addEventListener('resize', onWindowResize);

        document.addEventListener('DOMContentLoaded', (event) => {
            onWindowResize();
        });

    var chatButtonId = localStorage.getItem('chatButtonId');
    $(function(){
    if (chatButtonId) {
      setTimeout(() => {
        $('#' + chatButtonId).click();
        
        localStorage.removeItem('chatButtonId');
      }, 3000);
      
    }
    })
</script>
