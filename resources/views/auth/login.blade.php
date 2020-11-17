<x-layouts.files/>
<style>
    .login {
        color: white !important;
    }
</style>
<header class="mb-5">
    <x-layouts.navbar/>
</header>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="البريد الإلكتروني"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="كلمه السر"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">حفظ</span>
                </label>
            </div>

            <div class="flex items-center  mt-4">
                <x-jet-button class="ml-4">
                    تسجيل الدخول
                </x-jet-button>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        استرجاع رقمك السري
                    </a>
                @endif
            </div>
        </form>

        <div class="d-flex align-items-center mt-4 mb-4 ">
            <hr style="width: 100%;background-color: black;border-color: black"/>
            <p>Or</p>
            <hr style="width: 100%;background-color: black;border-color: black"/>
        </div>
        <a href="{{route('facebookauth')}}"
           class="form-control justify-content-center d-flex btn pt-4 pb-4  align-items-center"
           style="background-color: #275cc6 !important;color: white!important;">
            <img src="{{asset('Pics/Icons/fbauth.svg')}}" width="30" height="30" class="ml-3"/>
            <span id="login">
        تسجيل الدخول باستعمال فايسبوك
            </span>
        </a>
    </x-jet-authentication-card>
</x-guest-layout>
<footer>
    <x-layouts.footer/>
</footer>
