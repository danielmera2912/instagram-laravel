<x-guest-layout>
    <x-auth-card>
        <!-- Logo -->
        <x-slot name="logo">
            <h1 style="font-size:23px;">Instagram Laravel</h1>
            <img src="logos/insta-logo.png" style="width:180px;"/>
        </x-slot>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- Picture -->
            <x-picture-input/>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Surname -->
            <div>
                <x-input-label for="surname" :value="__('Surname')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- Nick -->
            <div>
                <x-input-label for="nick" :value="__('Nick')" />
                <x-text-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="old('nick')" required />
                <x-input-error :messages="$errors->get('nick')" class="mt-2" />
            </div>
            
             <!-- Avatar Image -->
            <!-- <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />

                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" />

                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div> -->

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
