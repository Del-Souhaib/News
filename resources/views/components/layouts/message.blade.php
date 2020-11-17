<x-guest-layout>


    <div>
        <div>
            <label for="name" class=" text-white">اسم المستخدم</label>
            <input id="messagename" required class="block mt-1 w-full form-control" type="text" name="name"
                   autofocus autocomplete="name"/>
        </div>

        <div class="mt-4">
            <label for="email" class=" text-white">البريد الالكتروني</label>
            <input type="email" name="email" id="messageemail" class="block mt-1 w-full form-control" required/>
        </div>

        <div class="mt-4">
            <label for="message" class=" text-white"> الرسالة</label>
            <textarea id="message" class="block mt-1 w-full form-control" name="text" required></textarea>
        </div>


        <div class="mt-4">
            <input type="submit" value="ارسال رسالة" class="form-control w-25" id="contact" style="background-color: #275cc6 !important;border:none;color: white!important;"/>
        </div>
        <div class="col-12 mt-4" style="color: red">
            <ul id="messageerrors" style="list-style: disc">

            </ul>
        </div>
    </div>
    <x-jet-validation-errors class="mb-4"/>

</x-guest-layout>

