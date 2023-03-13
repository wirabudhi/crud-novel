<x-guest-layout>
    {{-- Mendefinisikan status --}}
    {{-- Status akan ditampilkan apabila ada error --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Mendefinisikan form dengan method POST dan akan diteruskan ke route Login --}}
    <form method="POST" action="{{ route('login') }}">
        {{-- Token security data --}}
        @csrf

        {{-- Mendefinisikan email --}}
        <div>
            {{-- Label Email --}}
            <x-input-label for="email" :value="__('Email')" />
            {{-- Text Input Email --}}
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            {{-- Input Error apabila terdapat error pada field email --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Mendefinisikan password --}}
        <div class="mt-4">
            {{-- Label Password --}}
            <x-input-label for="password" :value="__('Password')" />
            {{-- Text Input Password --}}
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            {{-- Input Error apabila terdapat error pada field password --}}
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Mendefinisikan checkbox ingat saya --}}
        <div class="block mt-4">
            {{-- Label Ingat Saya --}}
            <label for="remember_me" class="inline-flex items-center">
                {{-- Checkbox --}}
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                {{-- Text --}}
                <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        {{-- Mendefinisikan link register dan button masuk --}}
        <div class="flex items-center justify-end mt-4">
            {{-- ? Apabila memiliki route bernama register --}}
            @if (Route::has('register'))
                {{-- Tampilkan link menuju route register --}}
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Tidak punya akun?') }}
                </a>
            @endif

            {{-- Button untuk masuk(login) --}}
            <x-primary-button class="ml-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
