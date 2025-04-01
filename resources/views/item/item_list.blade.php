@include('layouts.header')
<div class="flex flex-col h-5/6">
    <!--breadcrumbs-->
    <div class="px-12 py-1 max-sm:px-6">
        <nav class="flex justify-between w-full" aria-label="Breadcrumb">
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
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Items</p>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Items List</p>
                    </div>
                </li>
            </ol>
            <!-- Right side buttons -->
            <span class="w-fit max-md:w-full max-md:justify-center flex gap-3 max-sm:gap-1 max-[350px]:scale-75">
                <button class="hidden px-2 py-1.5 text-white bg-black rounded-lg max-sm:px-2 max-sm:py-1">Copy</button>
                <button class="px-2 py-3 text-white bg-black rounded-lg max-sm:px-2 max-sm:py-1" onclick="exportTableToCSV('item.csv')">CSV</button>
                <button class="hidden px-2 py-1.5 text-white bg-black rounded-lg max-sm:px-2 max-sm:py-1">Excel</button>
                <button class="hidden px-2 py-1.5 text-white bg-black rounded-lg max-sm:px-2 max-sm:py-1">PDF</button>
                <button data-popover-target="popover-click" data-popover-trigger="click" data-popover-placement="bottom"
                    type="button" class="px-2 py-3 text-white bg-black rounded-lg max-sm:px-2 max-sm:py-1">
                    Column Visibility
                </button>
                <div data-popover id="popover-click" role="tooltip"
                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-fit">
                    <ul class="flex flex-col w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                        <!-- First Column -->
                        <li>
                            <input id="filter_hash" type="checkbox" checked class="hidden peer">
                            <label for="filter_hash"
                                class="flex w-full px-3 py-1.5 border-b border-gray-200 rounded-t-lg select-none peer-checked:bg-blue-300"
                                onclick="filterColumn('#');">
                                #
                            </label>
                        </li>
                        <!-- Second Column -->
                        <li>
                            <input id="filter_name" type="checkbox" checked class="hidden peer">
                            <label for="filter_name"
                                class="flex w-full px-3 py-1.5 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                                onclick="filterColumn('Item Name');">
                                ItemName
                            </label>
                        </li>
                        <!-- Third Column -->
                        <li>
                            <input id="filter_qty" type="checkbox" checked class="hidden peer">
                            <label for="filter_qty"
                                class="flex w-full px-3 py-1.5 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                                onclick="filterColumn('Qty');">
                                Qty
                            </label>
                        </li>
                        <!-- Fourth Column -->
                        <li>
                            <input id="filter_status" type="checkbox" checked class="hidden peer">
                            <label for="filter_status"
                                class="flex w-full px-3 py-1.5 border-b border-gray-200 select-none peer-checked:bg-blue-300"
                                onclick="filterColumn('Status');">
                                Status
                            </label>
                        </li>
                        <!-- Fifth Column -->
                        <li>
                            <input id="filter_manage" type="checkbox" checked class="hidden peer">
                            <label for="filter_manage"
                                class="flex w-full px-3 py-1.5 rounded-b-lg select-none peer-checked:bg-blue-300"
                                onclick="filterColumn('Manage');">
                                Manage
                            </label>
                        </li>
                    </ul>
                    <div data-popper-arrow></div>
                </div>
            </span>
        </nav>
    </div>

        <!--search-->
        <div class="flex items-center w-1/2 gap-3 px-6 py-1 max-sm:px-4 max-md:w-full">
            <label for="search_item" class="text-xs">Search</label>

            <div class="flex items-center justify-between px-4 py-2 ">
            <form method="GET" action="{{ url('item/item_list') }}" class="flex items-center gap-2">
                <input 
                    type="text" 
                    name="search" 
                    id="searchItemName" 
                    value="{{ request('search') }}" 
                    class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg md:p-3 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" 
                    placeholder="Enter item name" 
                    required 
                />
                <button 
                    type="submit" 
                    class="py-2 md:py-3 px-4 md:px-6 bg-[{{ $settings[7]->value}}] text-white rounded-lg text-sm md:text-base">
                    Search
                </button>
            </form>
        </div>
        <button type="button" class="py-2 md:py-3 px-4 md:px-6 bg-[#000000] text-white rounded-lg text-sm md:text-base"
        onclick="window.location.href='/item/item_list'">Reset</button>
            <span class="flex items-center gap-3 w-fit max-md:w-full">
                <input type="number" id="col_num"
                    class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg md:p-3 md:text-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="10" min="1" oninput="showEntries()" required />
                Entries
            </span>
        </div>




        
        
        <!--btn controls-->
        

        <!--table-->
        <div><center>@include('_message')</center></div>
        <div class="flex flex-col px-12 py-1 overflow-y-auto bg-white max-sm:px-6">
            <span></span>
            <!--table from flowbite-->
            <div class="relative overflow-x-auto">
            <table id="itemsTable" class="w-full text-sm text-left text-gray-500 rtl:text-right">
    <thead class="text-xs text-white uppercase bg-[{{ $settings[7]->value}}]">
        <tr>
            <th scope="col" class="px-4 py-2 rounded-tl-lg">#</th>
            <th scope="col" class="px-4 py-2">Item image</th>
            <th scope="col" class="px-4 py-2">Item Name</th>
            <th scope="col" class="px-4 py-2">Qty</th>
            <th scope="col" class="hidden px-4 py-2">Item Code</th>
            <th scope="col" class="hidden px-4 py-2">Value ID</th>
            <th scope="col" class="hidden px-4 py-2">Min qty</th>
            <th scope="col" class="hidden px-4 py-2">Purchase price</th>
            <th scope="col" class="hidden px-4 py-2">Retail price</th>
            <th scope="col" class="hidden px-4 py-2">Wholesale price</th>
            <th scope="col" class="hidden px-4 py-2">Status id</th>
            <th scope="col" class="px-4 py-2">Status</th>
            <th scope="col" class="px-4 py-2 rounded-tr-lg">Manage</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $value)
        <tr class="text-black bg-white border-2">
            <td scope="row" class="px-4 py-2 font-medium whitespace-nowrap">{{ $value->id }}</td>
            <td>
                @if(!empty($value->getImageUrlAttribute()))
                <img src="{{$value->getImageUrlAttribute()}}" style="width: 40px; height:40px; border-radius:50px;">
                @endif
            </td>
            <td class="px-4 py-2 item-name">{{ $value->item_name }}</td>
            <td class="px-4 py-2">{{ $value->quantity }}</td>
            <td class="hidden px-4 py-2">{{ $value->item_code }}</td>
            <td class="hidden px-4 py-2">{{ $value->suppliers_id }}</td>
            <td class="hidden px-4 py-2">{{ $value->minimum_qty }}</td>
            <td class="hidden px-4 py-2">{{ $value->purchase_price }}</td>
            <td class="hidden px-4 py-2">{{ $value->retail_price }}</td>
            <td class="hidden px-4 py-2">{{ $value->wholesale_price }}</td>
            <td class="hidden px-4 py-2">{{ $value->status_id }}</td>
            <td class="px-4 py-2">
                <span style="padding: 5px 10px; border: 1px solid {{ $value->status_id == 1 ? 'green' : 'red' }}; border-radius: 5px; background-color: transparent; color: {{ $value->status_id == 1 ? 'green' : 'red' }}; cursor: pointer;">
                    {{ $value->status_id == 1 ? 'In Stock' : 'Out Of Stock' }}
                </span>
            </td>
            <td class="px-4 py-2">
                <a href="{{url('item/edit_item/'.$value->id)}}">
                    @if(has_permission(56))
                    <button class="p-2 border-2 rounded-lg">Edit</button>
                    @endif
                </a>
                <button id="status-button-{{ $value->id }}" class="p-2 text-white {{ $value->status_id == 1 ? 'bg-red-600' : 'bg-green-600' }} border-2 rounded-lg" onclick="toggleItemStatus({{ $value->id }})">
                    {{ $value->status_id == 1 ? 'Out Of stock' : 'In Stock' }}
                </button>
                <a href="{{url('item/delete/'.$value->id)}}">
                    @if(has_permission(55))
                    <button class="hidden p-2 text-white bg-red-600 border-2 rounded-lg">Delete</button>
                    @endif
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
<!-- Pagination links -->
<div class="flex justify-center p-1 mt-1 mb-6">
    <div class="pagination">
        {{ $items->links('vendor.pagination.tailwind') }}
    </div>
</div>

</div>
@include('layouts.footer')

    
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../../../scripts/common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.4/purify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
<script>
    function searchItems() {
    const searchValue = document.getElementById('searchItemName').value.toLowerCase();
    const rows = document.querySelectorAll('#itemsTable tbody tr');

    rows.forEach(row => {
        const itemName = row.querySelector('.item-name').textContent.toLowerCase();

        // Show row if the item name includes the search text; otherwise, hide it
        if (itemName.includes(searchValue)) {
            row.style.display = ''; // Show row
        } else {
            row.style.display = 'none'; // Hide row
        }
    });
}
function showEntries() {
        const rows = document.querySelectorAll('#itemsTable tbody tr'); // Target the suppliersTable
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
    function filterColumn(selectedColName) {
        // Get the table and its header row
        var table = document.getElementById("itemsTable");
        var th = table.querySelectorAll("thead th");
        var rows = table.querySelectorAll("tbody tr");

        // Find the index of the selected column
        var colIndex = -1;
        th.forEach((header, index) => {
            if (header.textContent.trim() === selectedColName) {
                colIndex = index;
            }
        });

        if (colIndex == -1) {
            console.error("Column not found!");
            return;
        }

        // Toggle visibility of the column
        var isHidden = th[colIndex].style.display === "none";
        th[colIndex].style.display = isHidden ? "" : "none";

        rows.forEach((row) => {
            var cells = row.querySelectorAll("td");
            if (cells[colIndex]) {
                cells[colIndex].style.display = isHidden ? "" : "none";
            }
        });
    }



    function exportTableToCSV(filename) {
    const rows = document.querySelectorAll("#itemsTable tr");
    let csvContent = "";

    rows.forEach((row, rowIndex) => {
        const cols = Array.from(row.querySelectorAll("th, td"));
        const rowContent = cols
            .filter((col, colIndex) => ![1, 11, 12].includes(colIndex)) // Exclude specific column indexes: Item Image (1), Status (11), Manage (12)
            .map(col => col.textContent.trim())
            .join(",");

        csvContent += rowContent + "\n";
    });

    const blob = new Blob([csvContent], { type: "text/csv" });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = url;
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}



function toggleItemStatus(ItemId) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch(`/item/toggle-status/${ItemId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(errorData => {
                throw new Error(errorData.message || 'Server error');
            });
        }
        return response.json();
    })
    .then(data => {
        const button = document.getElementById(`status-button-${ItemId}`); // Use supplierId instead of userId
        if (data.status_id == 1) {
            button.textContent = 'Out Of Stock';
            button.classList.remove('bg-red-600');
            button.classList.add('bg-green-600');
        } else {
            button.textContent = 'Activate';
            button.classList.remove('bg-green-600');
            button.classList.add('bg-red-600');
        }
        
        // Redirect to the previous page after updating status
        window.location.reload(); // Or specify a different URL if needed
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to toggle user status: ' + error.message);
    });
}

</script>


<script>
    const rowsPerPage = 10;
    const table = document.getElementById('itemsTable');
    const pagination = document.getElementById('pagination');
    const rows = table.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);

    let currentPage = 1;

    function showPage(page) {
        currentPage = page;

        // Hide all rows
        rows.forEach((row, index) => {
            row.style.display = 'none';
        });

        // Show only the rows for the current page
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        for (let i = start; i < end && i < rows.length; i++) {
            rows[i].style.display = '';
        }

        renderPagination();
    }

    function renderPagination() {
        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.innerText = i;
            button.className = `px-3 py-1 mx-1 rounded ${i === currentPage ? 'bg-[#47891E] text-white' : 'bg-gray-200'}`;
            button.onclick = () => showPage(i);
            pagination.appendChild(button);
        }
    }

    // Initialize the table with the first page
    showPage(1);
</script>

<style>
    @media (max-width: 768px) {
    /* Hide columns that you don't want to display on mobile */
    #itemsTable td.hidden,
    #itemsTable th.hidden {
        display: none;
    }

    /* Adjust the layout of the table for mobile screens */
    #itemsTable {
        border-collapse: collapse;
        width: 100%;
    }

    #itemsTable td, #itemsTable th {
        padding: 10px;
        text-align: left;
    }

    #itemsTable td {
        display: block;
        width: 100%;
        box-sizing: border-box;
    }

    /* Create a card-like structure for each row on mobile */
    #itemsTable tr {
        display: block;
        margin-bottom: 15px;
    }

    #itemsTable tr td:first-child {
        font-weight: bold;
    }

    #itemsTable td span {
        display: block;
        margin-top: 5px;
    }

    /* Stack the "manage" buttons in a column on mobile */
    #itemsTable td button {
        display: block;
        width: 100%;
        margin-bottom: 5px;
    }
}

</style>