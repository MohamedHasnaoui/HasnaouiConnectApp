<x-guest-layout  page="Sign Up">

    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <!-- Name -->
        <div>
            
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" source="images/nameIcon.svg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Adresse')" />
            <x-text-input id="email" class="block mt-1 w-full " source="images/emailIcon.svg" type="email" name="email" :value="old('email')" required/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required
                            source="images/passIcon.svg"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            
            <x-input-label for="password_confirmation" :value="__('Confirme Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required 
                            source="images/passIcon.svg" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center flex-col mt-4">
            <x-primary-button class="ms-4">
                {{ __('Sign Up') }}
            </x-primary-button>
            <div>Already have an account?
            <a class="underline text-sm mt-3 text-[#4F46E5] rounded-md focus:outline-none focus:ring-2 font-bold focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __(' Sign in') }}
            </a>
            </div>

        </div>
    </form>
</x-guest-layout>
