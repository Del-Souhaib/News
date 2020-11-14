<x-jet-action-section>
    <x-slot name="title">
        <p style="color: white">    حذف الحساب</p>
    </x-slot>

    <x-slot name="description">
        <p style="color: white">  احذف حسابك بشكل دائم.</p>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            بمجرد حذف حسابك ، سيتم حذف جميع موارده وبياناته نهائيًا. قبل حذف حسابك ، يرجى تنزيل أي بيانات أو معلومات
            ترغب في الاحتفاظ بها
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                حذف الحساب
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                حذف الحساب
            </x-slot>

            <x-slot name="content">
                هل أنت متأكد أنك تريد حذف حسابك؟ بمجرد حذف حسابك ، سيتم حذف جميع موارده وبياناته نهائيًا. الرجاء إدخال
                كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك نهائيًا
                <div class="mt-4" x-data="{}"
                     x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="كلمة المرور"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser"/>

                    <x-jet-input-error for="password" class="mt-2"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    حذف الحساب
                </x-jet-danger-button>
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    لا يهم
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
