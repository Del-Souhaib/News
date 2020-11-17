<x-layouts.files/>
<header class="mb-5">
    <x-layouts.navbar/>
</header>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            هل نسيت كلمة المرور؟ لا مشكلة. ما عليك سوى إعلامنا بعنوان بريدك الإلكتروني وسنرسل إليك عبر البريد الإلكتروني
            رابطًا لإعادة تعيين كلمة المرور يتيح لك اختيار كلمة مرور جديدة.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="البريد الالكتروني"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="flex items-center mt-4">
                <x-jet-button>
                   ارسال
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<footer>
    <x-layouts.footer/>
</footer>
