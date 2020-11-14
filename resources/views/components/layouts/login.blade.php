<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="">
        <label for="email" class="text-white">البريد الالكتروني</label>
        <input type="email" id="email" class="block mt-1 w-full form-control" name="email" :value="old('email')"
               required autofocus/>
    </div>

    <div class="mt-4">
        <label for="password" class="text-white">الرمز السري</label>
        <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required
               autocomplete="current-password"/>
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="">
            <input id="remember_me" type="checkbox" class="form-checkbox form-control" name="remember">
            <span class="ml-2 text-sm text-white">حفظ</span>
        </label>
    </div>

    <div class="mt-4 d-flex align-items-center">

        <button id="loginclick" class="form-control btn ml-4"
                style="background-color: #275cc6 !important;width:100px;color: white!important;">
            الدخول
        </button>
        @if (Route::has('password.request'))
            <a class="underline text-sm text-white" data-toggle="modal" data-target="#resetpassword"
               id="passwordreset">
                استرجاع الرقم السري
            </a>
        @endif

    </div>
    @if ($errors->any())
        <div class="text-danger mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
<div class="d-flex align-items-center mt-4 mb-4 ">
    <hr style="width: 100%;background-color: white;border-color: white"/>
    <p style="color: white">Or</p>
    <hr style="width: 100%;background-color: white;border-color: white"/>
</div>
<a href="{{route('facebookauth')}}" class="form-control justify-content-center d-flex btn pt-4 pb-4  align-items-center"
   style="background-color: #275cc6 !important;color: white!important;">
    <img src="{{asset('Pics/Icons/fbauth.svg')}}" width="30" height="30" class="ml-3"/>
    <span id="login">
        تسجيل الدخول باستعمال فايسبوك
    </span>
</a>

<script>
    document.getElementById('passwordreset').addEventListener('click', function () {
        $('#loginmodal').modal('hide')
    })



</script>
