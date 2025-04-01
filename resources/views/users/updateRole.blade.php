@include('layouts.header')
<div class="flex flex-col flex-grow">
    <div class="px-12 py-5 max-sm:px-6">
        <!-- Breadcrumbs -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <p class="inline-flex items-center text-sm font-medium text-gray-700">Main Panel</p>
                </li>
                <li aria-current="page">
                    <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Update Role</p>
                </li>
            </ol>
        </nav>
    </div>

                <!-- Flash Messages -->
    <div class="px-12 py-3">
        @if (session('success'))
            <div class="p-3 mb-4 text-green-800 bg-green-100 border border-green-400 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @elseif (session('error'))
            <div class="p-3 mb-4 text-red-800 bg-red-100 border border-red-400 rounded-lg">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <div class="p-6">
        <div class="flex flex-col flex-grow h-full p-6 border-2 rounded-lg">
        <form method="POST" action="{{ route('users.updateRole', $user->id) }}">
                @csrf
                <!-- Role Name -->
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-black">Role</label>
                    <input 
                        id="role" 
                        name="role" 
                        type="text" 
                        value="{{ $user->role_name }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" 
                        readonly 
                        required
                    >
                </div><br/>

                <!-- Permissions Checkboxes -->
                <div class="grid gap-6 mb-6 md:grid-cols-5 max-md:grid-cols-3 max-sm:grid-cols-1">
                    @foreach($permissions as $permission)
                        <div class="flex items-center me-4">
                            <input id="permission-{{ $permission->id }}" type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                            <label for="permission-{{ $permission->id }}" class="text-sm font-medium text-gray-900 ms-2">{{ $permission->permissions_name }}</label>
                        </div>
                    @endforeach
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-center w-full gap-4 max-sm:flex-col max-sm:p-0">
                    <button type="submit" class="py-3 px-6 bg-[{{ $settings[7]->value}}] text-white rounded-lg">Update</button>
                    <button type="reset" class="px-6 py-3 text-white bg-black rounded-lg">Reset</button>
                    <button type="button" class="px-6 py-3 text-white bg-red-600 rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full"
                        onclick="window.location.href='/users/rolesList'">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    @include('layouts.footer')

</div>



<script>
    window.onload = function() {
        // Check if success or error messages exist
        const successMessage = document.querySelector('.bg-green-100');
        const errorMessage = document.querySelector('.bg-red-100');

        // Function to hide the message after 4 seconds
        function hideMessage(messageElement) {
            if (messageElement) {
                setTimeout(function() {
                    messageElement.style.display = 'none';
                }, 4000); // 4000 milliseconds = 4 seconds
            }
        }

        // Hide the success or error message after 4 seconds
        hideMessage(successMessage);
        hideMessage(errorMessage);
    }
</script>