@include('layouts.header')
<div class="h-[90vh] max-lg:h-[92vh] flex flex-col grow">
    <!-- Breadcrumbs -->
    <div class="px-12 py-5 max-sm:px-6">
    <nav class="flex flex-col items-center justify-between md:flex-row" aria-label="Breadcrumb">
        <!-- Left-aligned Breadcrumbs -->
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <p class="inline-flex items-center text-sm font-medium text-gray-700">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 1 1 1-1h2a1 1 0 1 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Main Panel
                </p>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Customers</p>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Customers List</p>
                </div>
            </li>
        </ol>

        <!-- Right-aligned Buttons -->
        <div class="flex items-center justify-end w-full gap-3 mt-4 md:mt-0">
            <button onclick="copyTableData()"
                class="px-4 py-2 text-white bg-black rounded-lg max-sm:px-3 max-sm:py-1">Copy</button>
            <button onclick="exportToCSV()" class="px-4 py-2 text-white bg-black rounded-lg max-sm:px-3 max-sm:py-1">CSV</button>
            <button onclick="exportToExcel()" class="px-4 py-2 text-white bg-black rounded-lg max-sm:px-3 max-sm:py-1">Excel</button>
            <button class="px-4 py-2 text-white bg-black rounded-lg max-sm:px-3 max-sm:py-1" onclick="exportTableToPDF()">PDF</button>

            <button data-popover-target="popover-clickK" data-popover-trigger="click" type="button"
                class="px-4 py-2 text-white bg-black rounded-lg">Column Visibility</button>

            <div data-popover id="popover-clickK" role="tooltip"
                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-fit">
                <ul
                    class="flex flex-col w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                    <li>
                        <input id="filter_customer_code" type="checkbox" checked class="hidden peer">
                        <label for="filter_customer_code"
                            class="flex w-full px-4 py-2 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Customer Code', 'customersTable');"> Customer Code </label>
                    </li>
                    <li>
                        <input id="filter_customer_name" type="checkbox" checked class="hidden peer">
                        <label for="filter_customer_name"
                            class="flex w-full px-4 py-2 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Customer Name', 'customersTable');"> Customer Name </label>
                    </li>
                    <li>
                        <input id="filter_mobile_number" type="checkbox" checked class="hidden peer">
                        <label for="filter_mobile_number"
                            class="flex w-full px-4 py-2 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Mobile Number', 'customersTable');"> Mobile Number </label>
                    </li>
                    <li>
                        <input id="filter_email" type="checkbox" checked class="hidden peer">
                        <label for="filter_email"
                            class="flex w-full px-4 py-2 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Email', 'customersTable');"> Email </label>
                    </li>

                    <li>
                        <input id="filter_address" type="checkbox" checked class="hidden peer">
                        <label for="filter_address"
                            class="flex w-full px-4 py-2 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Address', 'customersTable');"> Address </label>
                    </li>
                    <li>
                        <input id="filter_manage" type="checkbox" checked class="hidden peer">
                        <label for="filter_manage"
                            class="flex w-full px-4 py-2 rounded-b-lg select-none peer-checked:bg-blue-300"
                            onclick="filterColumn('Manage', 'customersTable');"> Manage </label>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<!-- Search controls -->
<div class="flex items-center justify-between w-full gap-3 px-12 py-5 max-sm:px-6 max-md:flex-col">
    <div class="flex items-center w-1/2 gap-3 max-md:w-full">
        <label for="search_cat">Search</label>
        <input type="text" id="search_cat"
            class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Enter customer name" onkeyup="searchItems('search_cat', 'customersTable', 2)" required />
        <button onclick="searchItems('search_cat', 'customersTable', 2);"
            class="py-3 px-4 bg-[{{ $settings[7]->value}}] text-white rounded-lg">Search</button>
    </div>
    <span class="flex items-center gap-3 w-fit max-md:w-full">
        Show
        <input type="number" id="col_num"
            class="block w-full p-3 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="30" min="1" oninput="showEntries()" required />
        Entries
    </span>
</div>


    <!-- "Show Entries" controls -->
    

    <!-- Table -->
    <div class="flex flex-col flex-grow px-12 py-5 overflow-y-auto bg-white max-sm:px-6 max-lg:min-h-full">
        <div class="relative overflow-x-auto">
        <table id="customersTable" class="w-full text-sm text-left text-gray-500 rtl:text-right border-spacing-0">
    <thead class="text-xs text-white uppercase bg-[{{ $settings[7]->value}}]">
        <tr>
            <th scope="col" class="px-4 py-2 rounded-tl-lg">#</th>
            <th scope="col" class="px-4 py-2">Customer Code</th>
            <th scope="col" class="px-4 py-2">Customer Name</th>
            <th scope="col" class="px-4 py-2">Mobile Number</th>
            <th scope="col" class="px-4 py-2">Address</th>
            <th scope="col" class="px-4 py-2">Email</th>
            <th scope="col" class="hidden px-4 py-2">Due Amount</th>
            <th scope="col" class="hidden px-4 py-2">User ID</th>
            <th scope="col" class="hidden px-4 py-2">City ID</th>
            <th scope="col" class="hidden px-4 py-2">Status ID</th>
            <th scope="col" class="hidden px-4 py-2">City Name</th>
            <th scope="col" class="px-4 py-2 rounded-tr-lg">Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr class="text-black bg-white border-b">
            <td scope="row" class="px-4 py-2 font-medium whitespace-nowrap">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $customer->customer_id }}</td>
            <td class="px-4 py-2">{{ $customer->customer_name }}</td>
            <td class="px-4 py-2">{{ $customer->contact_number }}</td>
            <td class="px-4 py-2">{{ $customer->address_line_1 }} {{ $customer->address_line_2 }}</td>
            <td class="px-4 py-2">{{ $customer->email }}</td>
            <td class="hidden px-4 py-2">{{ number_format($customer->due_amount, 2) }}</td>
            <td class="hidden px-4 py-2">{{ $customer->user_id }}</td>
            <td class="hidden px-4 py-2">{{ $customer->cities_id }}</td>
            <td class="hidden px-4 py-2">{{ $customer->status_id }}</td>
            <td class="hidden px-4 py-2">{{ $customer->city_name }}</td>
            <td class="px-4 py-2">
                @if(has_permission(42))
                <button class="px-3 py-1 border rounded" onclick="editCustomer({{ $customer->id }})">Edit</button>
                @endif
                @if(has_permission(43))
                <button class="px-3 py-1 text-white bg-red-600 rounded" onclick="deleteCustomer({{ $customer->id }})">Delete</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>
@include('layouts.footer')

<!-- JavaScript -->
<script>
// Function to filter table rows based on the search term
function searchItems(searchInputId, tableId, columnIndex) {
    const searchInput = document.getElementById(searchInputId);
    const filter = searchInput.value.toLowerCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header
        const cells = rows[i].getElementsByTagName('td');
        const cell = cells[columnIndex]; // Column to search (0-indexed)

        if (cell) {
            const cellText = cell.textContent || cell.innerText;
            if (cellText.toLowerCase().indexOf(filter) > -1) {
                rows[i].style.display = ""; // Show matching row
            } else {
                rows[i].style.display = "none"; // Hide non-matching row
            }
        }
    }
}

// Function to show a specific number of rows in the table
function showEntries() {
    const rows = document.querySelectorAll('#customersTable tbody tr');
    let entries = document.getElementById('col_num').value;

    // Set default value of 30 if input is empty or invalid
    if (!entries || entries <= 0) {
        entries = 30;
    }

    rows.forEach((row, index) => {
        if (index < entries) {
            row.style.display = ''; // Show row
        } else {
            row.style.display = 'none'; // Hide row
        }
    });
}


function editCustomer(customerId) {
    window.location.href = `/customers/updateCustomer/${customerId}`;
}

function deleteCustomer(customerId) {
    if (confirm("Are you sure you want to delete this customer?")) {
        fetch(`/customers/deleteCustomer/${customerId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload(); // Reload page to see changes
            } else {
                alert(data.message);
            }
        });
    }
}

// Function to copy table data to clipboard
function copyTableData() {
    const table = document.getElementById("customersTable");
    const range = document.createRange();
    const selection = window.getSelection();
    
    // Select the entire table content
    range.selectNodeContents(table);
    selection.removeAllRanges();
    selection.addRange(range);
    
    // Copy the selected content to clipboard
    document.execCommand("copy");
    
    // Optional: Show a notification to the user
    alert("Table data copied to clipboard!");
}

function exportToCSV() {
    const table = document.getElementById('customersTable');
    let csvContent = '';

    // Updated headers to separate address columns
    const headers = [
        '#', 
        'Customer Code', 
        'Customer Name', 
        'Mobile Number',
        'Address Line 1', 
        'Address Line 2', 
        'Email', 
        'Due Amount',
        'User ID',
        'City ID',
        'Status ID',
        'City Name'
    ];
    csvContent += headers.join(',') + '\n';

    // Get table rows
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach(row => {
        const cells = row.querySelectorAll('td:not(:last-child)');
        const rowData = Array.from(cells).map((cell, index) => {
            // For address column, split into two separate columns
            if (index === 4) {
                const addressParts = cell.textContent.trim().split(/\s+/);
                // If address is short or has only one part, return empty string for second column
                const addressLine1 = addressParts.slice(0, Math.ceil(addressParts.length / 2)).join(' ');
                const addressLine2 = addressParts.slice(Math.ceil(addressParts.length / 2)).join(' ');
                return [
                    `"${addressLine1}"`, 
                    `"${addressLine2}"`
                ];
            }
            return `"${cell.textContent.trim()}"`;
        }).flat(); // Flatten the array to handle address split

        csvContent += rowData.join(',') + '\n';
    });

    // Create CSV file
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'customers.csv';
    link.click();
}

function exportToExcel() {
    const table = document.getElementById('customersTable');
    
    // Clone the table to modify without affecting the original
    const clonedTable = table.cloneNode(true);
    
    // Modify the cloned table headers
    const headerRow = clonedTable.querySelector('thead tr');
    headerRow.innerHTML = `
        <th>#</th>
        <th>Customer Code</th>
        <th>Customer Name</th>
        <th>Mobile Number</th>
        <th>Address Line 1</th>
        <th>Address Line 2</th>
        <th>Email</th>
        <th>Due Amount</th>
        <th>User ID</th>
        <th>City ID</th>
        <th>Status ID</th>
       <th>City Name</th>



    `;

    // Process body rows
    const bodyRows = clonedTable.querySelectorAll('tbody tr');
    bodyRows.forEach(row => {
        const addressCell = row.querySelector('td:nth-child(5)');
        const originalAddress = addressCell.textContent.trim();
        
        // Split address into two parts
        const addressParts = originalAddress.split(/\s+/);
        const addressLine1 = addressParts.slice(0, Math.ceil(addressParts.length / 2)).join(' ');
        const addressLine2 = addressParts.slice(Math.ceil(addressParts.length / 2)).join(' ');

        // Replace the single address cell with two cells
        addressCell.textContent = addressLine1;
        const newAddressCell = document.createElement('td');
        newAddressCell.textContent = addressLine2;
        row.insertBefore(newAddressCell, addressCell.nextSibling);

        // Remove the manage column
        row.removeChild(row.lastElementChild);
    });

    // Create workbook
    const wb = XLSX.utils.table_to_book(clonedTable, { sheet: 'Customers' });

    // Download Excel file
    XLSX.writeFile(wb, 'customers.xlsx');
}


function filterColumn(columnName, tableId) {
    const checkbox = document.getElementById(`filter_${columnName.toLowerCase().replace(/ /g, '_')}`);
    
    if (!checkbox) {
        console.error(`Checkbox with ID filter_${columnName.toLowerCase().replace(/ /g, '_')} not found.`);
        return; // Exit if checkbox is not found
    }

    const table = document.getElementById(tableId);
    const ths = table.querySelectorAll('th');
    const tds = table.querySelectorAll('tbody tr');

    let columnIndex;

    // Find the index of the column based on its name
    ths.forEach((th, index) => {
        if (th.textContent.trim() === columnName) {
            columnIndex = index;
        }
    });

    if (columnIndex === undefined) {
        console.error(`Column ${columnName} not found in the table header.`);
        return; // Exit if column is not found
    }

    // Toggle visibility based on checkbox state
    if (checkbox.checked) {
        ths[columnIndex].style.display = '';
        tds.forEach(td => {
            td.cells[columnIndex].style.display = '';
        });
    } else {
        ths[columnIndex].style.display = 'none';
        tds.forEach(td => {
            td.cells[columnIndex].style.display = 'none';
        });
    }
}



function exportTableToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Get the table data
    const table = document.getElementById('customersTable');

    // Extract table data
    const rows = [];
    const tableRows = table.querySelectorAll('tr');

    // Determine the number of columns to exclude (last 4 columns)
    let totalColumns = tableRows[0].querySelectorAll('th, td').length; // Total columns in the table
    let columnsToExclude = 5; // Number of columns to remove

    // Extract rows, excluding the last 4 columns
    tableRows.forEach((row, rowIndex) => {
        const cols = row.querySelectorAll('td, th');
        const rowData = [];

        cols.forEach((col, index) => {
            if (index < totalColumns - columnsToExclude) { // Include columns except the last 4
                rowData.push(col.innerText);
            }
        });

        // Skip empty rows
        if (rowData.length > 0) {
            rows.push(rowData);
        }
    });

    // Add table to PDF
    doc.autoTable({
        head: [rows[0]], // First row as headers
        body: rows.slice(1), // Remaining rows as table body
    });

    // Save PDF
    doc.save('customers.pdf');
}

</script>


<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
</html>