<!DOCTYPE html>
<html class="vh-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HasnaouiConnect</title>
        <link rel="shortcut icon" href="{{asset('images/icon.jpg')}}" type="image/x-icon">
      <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="css/header.css">
    </head>
    <body class="relative">
      <header class="absolute inset-x-0 top-0 z-50">
        <nav class="mx-auto mt-5 flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1 cursor-text">
            <a href="{{route('/')}}" class="-m-1.5 p-1.5">
              <img class="w-64" src="{{asset("images/brand.svg")}}" alt="">
            </a>
          </div>
          <div id="MenuTogler"  class="flex lg:hidden cursor-pointer">
            <button class="inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
              <span class="sr-only">Open main menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
            </button>
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="{{ route("register") }}" class="text-sm font-semibold leading-6 text-white rounded-full px-5 py-2 w-28 text-center bg-[#4F46E5] mr-6 hover:bg-[#3a33b8] transition-all ease-in-out">Sign Up</a>
            <a href="{{ route("login") }}" class="text-sm font-semibold leading-6 rounded-full px-5 py-2 w-28 text-center text-[#4F46E5] border border-[#4F46E5] hover:bg-[#3a33b8] hover:text-white transition-all ease-in-out">Log in</a>
          </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
          <!-- Background backdrop, show/hide based on slide-over state. -->
          <div class="hidden fixed inset-0 z-10"></div>
          <div id="colapsedMenu" class="menuInActive fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 transition-all ease-in-out duration-[250]">
            <div class="flex items-center justify-between mt-5">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="w-56" src="{{asset("images/brand.svg")}}" alt="">
              </a>
              <button id="AnotherMenuTogler"  type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <div class="mt-6 flow-root">
              <div class="-my-6 divide-y divide-gray-500/10">
                
                <div class="py-6">
                  <a href="{{ route("register") }}" class="my-4 mx-auto block text-sm font-semibold leading-6 text-white rounded-md  py-2 w-2/3 text-center bg-[#554ee5] hover:bg-[#3a33b8] transition-all ease-in-out">Sign Up</a>
                  <a href="{{ route("login") }}" class="my-4 mx-auto block text-sm font-semibold leading-6 rounded-md px-5 py-2 w-2/3 text-center text-[#4F46E5] border border-[#4F46E5] hover:bg-[#3a33b8] hover:text-white transition-all ease-in-out">Log in</a>
          
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
        <div class="relative isolate px-6 pt-14 lg:px-8 ">
          <div class="mx-auto max-w-3xl py-3 mt-40">
            <div class="text-center">
              <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Connect Effortlessly!</h1>
              <p class="mt-6 text-lg leading-8 text-gray-600">Welcome to the future of online communication, where connecting with friends, family, and colleagues is as simple as a click. Dive into a world of instant messaging that feels personal and professional. Say hello to smooth, uninterrupted chats and goodbye to the complexities of digital dialogue. Start your effortless chat experience today!</p>
              <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route("login") }}" class="rounded-md bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</a>
                <a href="{{ route("register") }}" class="text-sm font-semibold leading-6 ">Create account <span aria-hidden="true">→</span></a>
              </div>
            </div>
          </div>
          <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div id="bgGrad" class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 "></div>
          </div>
        </div>
    </body>
      <script src="{{asset("js/header.js")}}" ></script>
</html>
