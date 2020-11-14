<style>
    #logupmodal {
        color: white;
    }

    #logupmodal a:hover {
        color: white;
    }

    #logupmodal #loginlink {
        cursor: pointer;
    }

    #logupmodal #create {
        width: 60px;
    }
</style>
<x-guest-layout id="logininmodal">
    <x-slot name="logo">
        <x-jet-authentication-card-logo/>
    </x-slot>


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="text-white">اسم المستخدم</label>
            <input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')"
                   required autofocus autocomplete="name"/>
        </div>

        <div class="mt-4">
            <label for="email" class="text-white">البريد الالكتروني</label>
            <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')"
                   required/>
        </div>

        <div class="mt-4">
            <label for="password" class="text-white">الرمز السري</label>
            <input id="password" class="block mt-1 w-full form-control" type="password" name="password" required
                   autocomplete="new-password"/>
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="text-white">تاكيد الرمز السري</label>
            <input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                   name="password_confirmation" required autocomplete="new-password"/>
        </div>

        <div class="mt-4 d-flex align-items-center">
            <button class="form-control ml-4 " id="create" style="background-color: #275cc6 !important;border:none;color: white!important;">
                انشاء
            </button>
            <p class="underline text-sm text-white" id="loginlink" data-toggle="modal" data-target="#loginmodal">
                تسجيل الدخول
            </p>


        </div>
        <x-jet-validation-errors class="mb-4"/>

    </form>
    <div class="d-flex align-items-center mt-4 mb-4">
        <hr style="width: 100%;background-color: white;border-color: white"/>
        <p class="text-white">Or</p>
        <hr style="width: 100%;background-color: white;border-color: white"/>
    </div>
    <a href="{{route('facebookauth')}}"
       class="form-control justify-content-center d-flex btn pt-4 pb-4  align-items-center"
       style="background-color: #275cc6 !important;color: white!important;">
        <img src="{{asset('Pics/Icons/fbauth.svg')}}" width="30" height="30" class="ml-3"/>
        <span id="login">
        تسجيل الدخول باستعمال فايسبوك
    </span>
    </a>

</x-guest-layout>
<script>
    document.getElementById('loginlink').addEventListener('click', function () {
        $('#logupmodal').modal('hide');
        //   alert('hhhh')

    })
</script>
