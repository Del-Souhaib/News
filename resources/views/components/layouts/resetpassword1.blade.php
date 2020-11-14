<x-guest-layout>


        <div class="mb-4 text-sm text-white d-flex justify-content-end">
           <h3> عند كتابة البريد الالكتروني خاصتك سوف تتوصل في البريد برابط تغيير كلمة السر الخاصة بك</h3>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <label for="email" class="text-white" >البريد الالكتروني</label>
                <input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">
                    ارسال
                </button>
            </div>
        </form>
</x-guest-layout>
