@include('layouts.header')
    <div class="flex flex-col flex-grow">
        <!--breadcrumbs-->
        <div class="px-12 py-5 max-sm:px-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <p class="inline-flex items-center text-sm font-medium text-gray-700">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Main Panel
                        </p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Settings</p>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Change Password</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <!--main panel-->
        <div class="p-6">
        @include('_message')
        <form method="post" action="">
        {{csrf_field()}}
            <div class="flex flex-col flex-grow h-full p-6 border-2 rounded-lg">
                <div class="grid mb-6">
                    <div>
                        <label for="c_psw" class="block mb-2 text-sm font-medium text-black ">Current Password</label>
                        <input type="password" id="c_psw" name="old_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter current password" required />
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="n_psw" class="block mb-2 text-sm font-medium text-black ">New Password</label>
                        <input type="password" id="n_psw" name="new_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter new password" required />
                            @error('new_password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="con_psw" class="block mb-2 text-sm font-medium text-black ">Confirm New Password</label>
                        <input type="password" id="con_psw" name="new_password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter new password again" required />
                            @error('confirm_new_password')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="flex items-center justify-center w-full gap-4 max-sm:flex-col">
                    <button type="submit"
                        class="py-3 px-6 bg-[{{ $settings[7]->value}}] text-white rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">Create</button>
                    <button
                    type="button" id="cancel" class="px-6 py-3 text-white bg-red-600 rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full" onclick="window.location.href='{{ route('settings_page') }}'">Cancel</button>
                </div>
            </div>
            </form>
        </div>
        <div class="flex-grow"></div>
        @include('layouts.footer')


    </div>
</body>
<script src="../../../scripts/common.js"></script>

</html>