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
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Site Settings</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <!--main panel-->
        <form method="POST" action="{{ isset($sitevalue) ? route('settings.update', $sitevalue->id) : route('settings.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($sitevalue))
            @method('PUT')
        @endif

        <div class="p-6">
        {{-- Validation Errors Summary --}}
                @if ($errors->any())
                <div class="relative px-4 py-3 mb-4 text-red-700 border border-red-400 rounded bg-red-50" role="alert">
                <strong class="font-bold">Oops! There were some errors with your submission:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

                @endif

                {{-- Success Message --}}
                @if (session('success'))
                <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>

                @endif

                {{-- Error Message --}}
                @if (session('error'))
                <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>

                @endif
            <div class="flex flex-col flex-grow h-full p-6 border-2 rounded-lg">
                <div class="grid gap-6 mb-6 md:grid-cols-1">
                    <div>
                        <label for="site_name" class="block mb-2 text-sm font-medium text-black">Site Name</label>
                        <input type="text" id="site_name" name="site_name" value="{{ $sitevalue->site_name ?? '' }}" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter unit name" required />
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="sidebar_one_name" class="block mb-2 text-sm font-medium text-gray-900">Sidebar One Name</label>
                        <input type="text" id="sidebar_one_name" name="sidebar_one_name" value="{{ $sitevalue->sidebar_one_name ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter unit name" required />
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="sidebar_two_name" class="block mb-2 text-sm font-medium text-gray-900">Sidebar Two Name</label>
                        <input type="text" id="sidebar_two_name" name="sidebar_two_name" value="{{ $sitevalue->sidebar_two_name ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter unit name" required />
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="url" class="block mb-2 text-sm font-medium text-gray-900">Contact Number</label>
                        <input type="text" id="url" name="contact_number" value="{{ $sitevalue->contact_number ?? '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Enter unit name" required />
                    </div>
                </div>
                <div class="grid mb-6">
                    <div>
                        <label for="company_logo" class="block mb-2 text-sm font-medium text-gray-900">Company Logo</label>
                        <input type="file" name="company_logo" id="company_logo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            accept="image/*" onchange="previewLogo(event)" />
                        <div class="mt-4">
                            @if(isset($sitevalue) && $sitevalue->company_logo)
                                <!-- Reduced the preview size by applying max-width and height -->
                                <img id="logo_preview" src="{{ asset($sitevalue->company_logo) }}" 
                                    class="w-auto h-20 max-w-full rounded-lg" alt="Current Logo" />
                            @else
                                <img id="logo_preview" class="w-auto h-20 max-w-full rounded-lg" 
                                    alt="Logo Preview" style="display: none;" />
                            @endif
                        </div>
                    </div>
                </div>


                <div class="flex items-center justify-center w-full gap-4 max-sm:flex-col">
                    <button
                        class="py-3 px-6 bg-[{{ $settings[7]->value}}] text-white rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">Save</button>
                        <button type="button" id="reset-system-btn" 
                            class="px-6 py-3 text-white bg-[#0c0c0c] rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">
                            Reset System
                        </button>
                    <button type="button" class="px-6 py-3 text-white bg-red-600 rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full"
                        onclick="window.location.href='/settings/settings'">Cancel</button>
                </div>
            </div>
        </div>
</form>
        <div class="flex-grow"></div>
        @include('layouts.footer')


    </div>
</body>
<script>
function previewLogo(event) {
    const logoPreview = document.getElementById('logo_preview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            logoPreview.src = e.target.result;
            logoPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}


    // Auto-hide alert messages after 4 seconds
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(() => {
            const alerts = document.querySelectorAll('.relative[role="alert"]');
            alerts.forEach(alert => alert.style.display = 'none');
        }, 4000); // 4000 milliseconds = 4 seconds
    });

    
</script>

<script src="../../../scripts/common.js"></script>

</html>


<script>
    document.getElementById('reset-system-btn').addEventListener('click', function () {
        fetch('{{ route('reset.system') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); // Show success message
            location.reload(); // Refresh the page
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while clearing the cache.');
        });
    });
</script>