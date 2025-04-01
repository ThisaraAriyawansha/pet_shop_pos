@include('layouts.header')
<div class="flex flex-col flex-grow">
    <!-- Breadcrumbs -->
    <div class="px-12 py-5 max-sm:px-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <p class="inline-flex items-center text-sm font-medium text-gray-700">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 1 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Main Panel
                    </p>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Settings</p>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Change Site</p>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="p-6">
        <div class="flex flex-col flex-grow h-full p-6 border-2 rounded-lg">
            <div class="grid gap-6 mb-6 md:grid-cols-3">
                <div class="md:col-span-2">
                    <label for="key" class="block mb-2 text-sm font-medium text-black">KEY</label>
                    <select id="key" name="key"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="0">Select Setting</option>
                        @foreach ($sitevalue as $value)
                            <option value="{{ $value->id }}" data-value="{{ $value->value }}" data-key="{{ $value->id }}">{{ $value->key }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-2">
            <!-- Value Input Field -->
            <div id="value-input">
                <label for="value" class="block mb-2 text-sm font-medium text-black">Value</label>
                <input id="value" name="value" type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Value" required>
            </div>

            <!-- Image Upload Field -->
            <div id="image-upload" style="display:none;">
                <label for="image" class="block mb-2 text-sm font-medium text-black">Upload Image</label>
                <input type="file" id="image_login" name="image_login" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <img id="image-preview" src="" alt="Image Preview" style="display:none; width: 100px; height: 100px; object-fit: cover;">
            </div>

            <!-- Color Picker -->
            <div id="color-picker" style="display:none;">
                <label for="color" class="block mb-2 text-sm font-medium text-black">Select Color</label>
                <input type="color" id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
        </div>


        <div class="flex items-center justify-center w-full gap-4 max-sm:flex-col max-sm:p-0">
            <button type="submit" class="py-3 px-6 bg-[#029ED9] text-white rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full hidden">
                Add
            </button>
            <button type="button" id="update-btn" class="px-6 py-3 text-white bg-[{{ $settings[7]->value}}] rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">
                Update
            </button>
            <button type="button" id="reset-system-btn" 
                class="px-6 py-3 text-white bg-[#0c0c0c] rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">
                Reset System
            </button>
            <button type="button" class="px-6 py-3 text-white bg-red-600 rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full" 
                onclick="window.location.href='/settings/settings'">
                Cancel
            </button>
        </div>

        </div>
    </div>

    @include('layouts.footer')

</div>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    const keySelect = document.getElementById('key');
    const valueInput = document.getElementById('value-input');
    const imageUpload = document.getElementById('image-upload');
    const colorPicker = document.getElementById('color-picker');
    const valueField = document.getElementById('value');
    const imagePreview = document.getElementById('image-preview');
    const imageInput = document.getElementById('image_login'); // Corrected ID for the image input
    const colorInput = document.getElementById('color');

    // Function to reset visibility of input sections
    function resetFields() {
        valueInput.style.display = 'none';
        imageUpload.style.display = 'none';
        colorPicker.style.display = 'none';
        imagePreview.style.display = 'none';
        valueField.value = ''; // Reset value field
    }

    // Listen for changes in the select dropdown
    keySelect.addEventListener('change', function () {
        const selectedKey = this.options[this.selectedIndex].getAttribute('data-key');
        const selectedValue = this.options[this.selectedIndex].getAttribute('data-value');

        console.log('Selected Key:', selectedKey);
        console.log('Selected Value:', selectedValue);

        // Reset all fields initially
        resetFields();

        if (selectedKey === '1') {
            // Show image upload field for specific keys
            imageUpload.style.display = 'block';
            if (selectedValue) {
                imagePreview.src = `/${selectedValue}`;
                imagePreview.style.display = 'block';
            }
        } else if (selectedKey === '13') {
            // Show image upload for icons
            imageUpload.style.display = 'block';
            if (selectedValue) {
                imagePreview.src = `/${selectedValue}`;
                imagePreview.style.display = 'block';
            }
        } else if (['2', '3', '4', '5', '7', '8', '14' , '15', '16'].includes(selectedKey)) {
            // Show color picker for specific keys
            colorPicker.style.display = 'block';
            if (selectedValue) {
                colorInput.value = selectedValue;
            }
        } else {
            // Default case: Show value input
            valueInput.style.display = 'block';
            valueField.value = selectedValue || '';
        }
    });

    // Update value field when a color is picked
    colorInput.addEventListener('input', function () {
        valueField.value = this.value;
    });

    // Update value field when an image is selected
    imageInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                valueField.value = imageInput.files[0].name; // Use file name for the value field
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});

// Update button event listener
document.addEventListener('DOMContentLoaded', function () {
    const updateButton = document.getElementById('update-btn');
    const keySelect = document.getElementById('key');
    const valueField = document.getElementById('value');
    const imageInput = document.getElementById('image_login'); // Corrected ID for the image input

    updateButton.addEventListener('click', function () {
        const selectedKey = keySelect.value;
        const value = valueField.value;

        if (!selectedKey || selectedKey === '0') {
            alert('Please select a valid key.');
            return;
        }

        const formData = new FormData();
        formData.append('id', selectedKey);
        formData.append('value', value);

        // Check if an image file is selected and append it
        if (imageInput.files.length > 0) {
            formData.append('image_login', imageInput.files[0]);
        }

        // Send the form data via AJAX
        fetch(`/settings/update`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Value updated successfully!');
                location.reload();
            } else {
                alert('Failed to update value.');
            }
        })
        .catch(error => {
            console.error('Error updating value:', error);
        });
    });
});


</script>


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
