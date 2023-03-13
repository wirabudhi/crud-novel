<x-guest-layout>
    {{-- Mendefinisikan form dengan method POST dan meneruskannya ke route register --}}
    <form method="POST" action="{{ route('register') }}">
        {{-- Token security data --}}
        @csrf

        {{-- Mendefinisikan nama --}}
        <div>
            {{-- Label Nama --}}
            <x-input-label for="name" :value="__('Nama')" />
            {{-- Text Input Nama --}}
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            {{-- Input Error apabila terdapat error pada field nama --}}
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Mendefinisikan Email --}}
        <div class="mt-4">
            {{-- Label Email --}}
            <x-input-label for="email" :value="__('Email')" />
            {{-- Text Input Email --}}
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            {{-- Input Error apabila terdapat error pada field email --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Mendefinisikan Password --}}
        <div class="mt-4">
            {{-- Label Password --}}
            <x-input-label for="password" :value="__('Password')" />
            {{-- Text Input Password --}}
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            {{-- Input Error apabila terdapat error pada field password --}}
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Mendefinisikan konfirmasi password --}}
        <div class="mt-4">
            {{-- Label Konfirmasi Password --}}
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            {{-- Text Input Konfirmasi Password --}}
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            {{-- Input Error apabila terdapat error pada field konfirmasi password --}}
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Mendefinisikan link login dan button daftar --}}
        <div class="flex items-center justify-end mt-4">
            {{-- Menampilkan link menuju route login --}}
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            {{-- Menampilkan button daftar --}}
            <x-primary-button class="ml-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
