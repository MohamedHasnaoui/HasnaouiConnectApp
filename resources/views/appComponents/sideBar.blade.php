@php
    $user = App\Models\User::find(Auth::id());
@endphp
<aside id="aside1" class="flex flex-col justify-between top-0 -translate-x-80 fixed lg:inset-0 bg-[#4F46E5] z-[2147483648]  lg:z-50 h-full w-80 rounded-s transition-transform duration-200 lg:translate-x-0">
    <div class="relative border-b border-white/20">
      <a class="flex items-center gap-4 py-6 px-8" href="#/">
        <div class="flex lg:flex-1 ">
            <img class="w-64" src="{{asset("images/brandWhite.svg")}}" alt="">
        </div>
      </a>
      <button id="CloseMenu" class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none lg:hidden" type="button">
        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </span>
      </button>
    </div>
    <div class="m-4">
      <ul class="mb-4 flex flex-col gap-1">
        <li>
          <a aria-current="page" class="" href="{{route('dashboard')}}">
            <button id="chatButton" class="{{ (Route::currentRouteName()=='dashboard'|| Route::currentRouteName()=='conversation') ? 'activeMenu':''}} middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
              <img src="images/homeIcon.svg" alt="home">
              <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-bold capitalize">Home</p>
            </button>
          </a>
        </li>
        <li>
          <a class="" href="{{ route('users') }}">
            <button id="usersButton"  class="{{ Route::currentRouteName()=='users' ? 'activeMenu':''}} middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
              <img src="images/usersIcon.svg" alt="users">
              <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-bold capitalize">Users</p>
            </button>
          </a>
        </li>
        <li>
          <a class="" href="{{route('settings')}}">
            <button id="settButton" class=" {{ Route::currentRouteName()=='settings' ? 'activeMenu':''}} middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
              <img src="images/settingIcon.svg" alt="settings">
              <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-bold capitalize">Settings</p>
            </button>
          </a>
        </li>
      </ul>
    </div>
    <div class="mt-auto w-72 mx-auto mb-4 pt-6 flex items-center border-t border-[#ffffff50]">
        <div class="rounded-t-full rounded-full overflow-hidden border border-black bg-white h-10 w-10">
          <img src="{{$user->profile_picture}}" class="block" alt="image">
        </div>
        <div class="text-white ml-2">
          <p>{{$user->name}}</p>
          <small>{{Auth::id()==1? "Admin" :"Basic Member"}}</small>
        </div>
      <div class="ml-auto mr-2">
        <a href="{{route('logout')}}"> <img src="images/goIcon.svg" alt="go"></a>
      </div>
    </div>
  </aside>