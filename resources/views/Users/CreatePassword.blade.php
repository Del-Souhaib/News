<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <x-layouts.files/>


    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <style>
        * {
            direction: rtl;
            text-align: right;
        }
    </style>
    <title>انشاء كلمة المرور</title>

</head>
<body>
<header>
    <x-layouts.navbar/>

</header>
<main>
    <x-jet-authentication-card>


        <form method="POST" action="{{ url('createpasswordclick') }}">
            @csrf

            <div>
                <x-jet-label for="passowrd1" value="كلمة المرور"/>
                <x-jet-input id="passowrd1" class="block mt-1 w-full" type="password" name="password"
                              required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password2" value="اعادة كلمة المرور"/>
                <x-jet-input id="password2" class="block mt-1 w-full" type="password" name="password_confirmation "
                             required
                             autocomplete="current-password"/>
            </div>
            <div class="flex items-center  mt-4 mb-4">
                <x-jet-button class="ml-4">
                    انشاء كلمة السر
                </x-jet-button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>


    </x-jet-authentication-card>
</main>
<footer>
    <x-layouts.footer/>
</footer>

</body>
</html>
