<x-layouts.files/>
<header class="mb-5">
    <x-layouts.navbar/>
</header>
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo/>
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                يُرجى تأكيد الوصول إلى حسابك بإدخال رمز المصادقة المقدم من تطبيق المصادقة
            </div>
            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                يُرجى تأكيد الوصول إلى حسابك بإدخال رمز المصادقة المقدم من تطبيق المصادقة
            </div>
            <x-jet-validation-errors class="mb-4"/>
            <form method="POST" action="/two-factor-challenge">
                @csrf
                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="رمز المصادقة"/>
                    <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code"
                                 autofocus x-ref="code" autocomplete="one-time-code"/>
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="رمز الاسترداد"/>
                    <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code"
                                 x-ref="recovery_code" autocomplete="one-time-code"/>
                </div>

                <div class="flex items-center mt-4">
                    <x-jet-button class="ml-4">
                        تسجيل الدخول
                    </x-jet-button>
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="! recovery"
                            x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        استخدام رمز الاسترداد
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                            x-show="recovery"
                            x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        استخدم رمز المصادقة
                    </button>


                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
<footer>
    <x-layouts.footer/>
</footer>
