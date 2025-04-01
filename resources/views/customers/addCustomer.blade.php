@include('layouts.header')
<div class="flex flex-col flex-grow">
    <!--breadcrumbs-->
    <div class="px-12 py-5 max-sm:px-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <p class="inline-flex items-center text-sm font-medium text-gray-700">
                        Main Panel
                    </p>
                </li>
                <li>
                    <div class="flex items-center">
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Customers</p>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Add New Customer</p>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <!--main panel-->
    <div class="p-6">
        <form action="{{ route('customers.store') }}" method="POST" id="addCustomerForm">
            @csrf
            <div class="flex flex-col flex-grow h-full p-6 border-2 rounded-lg">
                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div class="md:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-black">Customer Name</label>
                        <input id="name" name="name" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter customer name" required>
                    </div>



                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="m_no" class="block mb-2 text-sm font-medium text-black">Mobile Number</label>
                        <input id="Mobile_Number" name="Mobile_Number" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter mobile number" required>
                    </div>
                    <div class="hidden md:col-span-2">
                        <label for="city" class="block mb-2 text-sm font-medium text-black">City</label>
                        <select id="city" name="city"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="1">Select city</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
                        <input id="email" name="email" type="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter customer email" >
                    </div>
                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="addl1" class="block mb-2 text-sm font-medium text-black">Address Line 1</label>
                        <input id="addl1" name="addl1" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter address line 1" required>
                    </div>
                    <div>
                        <label for="addl2" class="block mb-2 text-sm font-medium text-black">City Name</label>
                        <input id="city_name" name="city_name" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter City Name">
                    </div>
                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="due" class="block mb-2 text-sm font-medium text-black">Due Amount</label>
                        <input id="due" name="due" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Enter due amount">
                    </div>
                </div>

                <div class="flex items-center justify-center w-full gap-4 max-sm:flex-col max-sm:p-0">
                    <button type="submit"
                        class="py-3 px-6 bg-[{{ $settings[7]->value}}] text-white rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full">Add</button>
                    <button type="button" class="px-6 py-3 text-white bg-black rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full"
                        onclick="resetForm()">Reset</button>
                    <button type="button" class="px-6 py-3 text-white bg-red-600 rounded-lg max-sm:py-1 max-sm:px-3 max-sm:w-full"
                        onclick="window.location.href='/customers/customers'">Cancel</button>
                </div>

                <!-- Success and Error Messages -->
                <div id="errorMessage" class="items-center justify-between hidden px-6 py-4 mt-3 mb-4 text-sm text-red-800 bg-red-100 border border-red-300 rounded-lg shadow-md ">
                    <span id="errorText">An error occurred</span>
                    <button class="ml-2 text-red-500" onclick="closeMessage('errorMessage')">×</button>
                </div>
                <div id="successMessage" class="items-center justify-between hidden px-6 py-4 mt-3 mb-4 text-sm text-green-800 bg-green-100 border border-green-300 rounded-lg shadow-md ">
                    <span id="successText">Operation Successful</span>
                    <button class="ml-2 text-green-500" onclick="closeMessage('successMessage')">×</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('layouts.footer')



<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../../../scripts/common.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Submit the form using AJAX
    $('#addCustomerForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var formData = form.serialize(); // Serialize form data

        // Hide any previous messages before sending the request
        $('#errorMessage').hide();
        $('#successMessage').hide();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    // Show success message for 4 seconds
                    const successMessage = document.getElementById('successMessage');
                    document.getElementById('successText').textContent = response.message;
                    successMessage.style.display = 'flex';

                    // Hide the success message after 4 seconds
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                        location.reload();

                    }, 4000);

                    // Reset the form fields
                    document.getElementById('addCustomerForm').reset();
                }
            },
            error: function (xhr, status, error) {
                // Show error message if the request fails
                const errorMessage = document.getElementById('errorMessage');
                document.getElementById('errorText').textContent = xhr.responseJSON.message || 'An unexpected error occurred.';
                errorMessage.style.display = 'flex';

                // Hide the error message after 4 seconds
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 4000);
            }
        });
    });

    // Reset form function
    function resetForm() {
        document.getElementById('addCustomerForm').reset();
        $('#city').val(null).trigger('change'); // Reset Select2 dropdown
    }

    // Close message function
    function closeMessage(id) {
        document.getElementById(id).style.display = 'none';
    }
</script>



<script>
    function resetForm() {
        // Reset all input fields
        document.getElementById('name').value = '';
        document.getElementById('Mobile_Number').value = '';
        document.getElementById('email').value = '';
        document.getElementById('addl1').value = '';
        document.getElementById('city_name').value = '';
        document.getElementById('due').value = '';
        document.getElementById('city').selectedIndex = 0; // Reset city dropdown
        // Reset Select2 (if applied)
        $('#city').trigger('change');
        location.reload();

    }
</script>