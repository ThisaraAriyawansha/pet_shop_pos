@include('layouts.header')

        <!--breadcrumbs-->
        <div class="px-12 py-2 max-sm:px-6">
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
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">Dashboard</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--green/blue data grid-->
    <div class="flex flex-wrap items-center justify-center gap-5 py-2">

    <div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
        <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
            <img src="{{ asset('images/dash/sa.png') }}" alt="card-img" class="w-1/2">
        </div>
        <div class="flex flex-col items-center justify-center w-2/3">
            <p class="w-full pl-2 text-xs">Total Sales Amount</p>
            <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($totalSales, 2) }}</h3>
        </div>
    </div>
    
    <div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
        <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
            <img src="{{ asset('images/dash/sd.png') }}" alt="card-img" class="w-1/2">
        </div>
        <div class="flex flex-col items-center justify-center w-2/3">
            <p class="w-full pl-2 text-xs">Total Sales Due</p>
            <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($totalDue, 2) }}</h3>
        </div>
    </div>

    <div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
        <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
            <img src="{{ asset('images/dash/ea.png') }}" alt="card-img" class="w-1/2">
        </div>
        <div class="flex flex-col items-center justify-center w-2/3">
            <p class="w-full pl-2 text-xs">Total Expenses Amount</p>
            <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($totalExpenses, 2) }}</h3>
        </div>
    </div>

    <div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
    <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
        <img src="{{ asset('images/dash/sd.png') }}" alt="card-img" class="w-1/2">
    </div>
    <div class="flex flex-col items-center justify-center w-2/3">
        <p class="w-full pl-2 text-xs">Total Payment Received (Sales)</p>
        <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($totalSales, 2) }}</h3>
    </div>
</div>

<div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
    <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
        <img src="{{ asset('images/dash/sa.png') }}" alt="card-img" class="w-1/2">
    </div>
    <div class="flex flex-col items-center justify-center w-2/3">
        <p class="w-full pl-2 text-xs">Today Total Sales</p>
        <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($todaySales, 2) }}</h3>
    </div>
</div>

<div class="w-1/6 max-lg:w-1/3 max-sm:w-1/2 h-[70px] bg-[#029ED914] flex rounded-lg">
    <div class="bg-[{{ $settings[7]->value}}] w-1/3 h-full flex justify-center items-center rounded-l-lg">
        <img src="{{ asset('images/dash/ea.png') }}" alt="card-img" class="w-1/2">
    </div>
    <div class="flex flex-col items-center justify-center w-2/3">
        <p class="w-full pl-2 text-xs">Today Total Expenses</p>
        <h3 class="w-full pl-2 text-xl max-lg:text-lg">Rs. {{ number_format($todayExpenses, 2) }}</h3>
    </div>
</div>

</div>

    <!--rounded panel-->
    <div class="px-12 max-sm:px-6">
    <div class="rounded-2xl border-black border-2 h-[150px] max-md:h-fit flex items-center gap-3 max-md:flex-col">
        
        <!-- Customers Count -->
        <div class="flex flex-col items-center justify-center w-1/4 h-full max-md:w-full">
            <div class="flex max-md:items-center">
                <img src="{{ asset('images/dash/customer.png') }}" alt="card-img" class="w-1/2">
                <span class="flex flex-col w-1/2 h-full justify-evenly">
                    <p class="text-center">Customers</p>
                    <h3 class="text-2xl font-bold text-center">{{ $customerCount }}</h3>
                </span>
            </div>
        </div>
        <div class="w-[1px] h-5/6 border-[1px] border-black max-md:w-5/6"></div>

        <!-- Suppliers Count -->
        <div class="flex flex-col items-center justify-center w-1/4 h-full max-md:w-full">
            <div class="flex max-md:items-center">
                <img src="{{ asset('images/dash/supplier.png') }}" alt="card-img" class="w-1/2">
                <span class="flex flex-col w-1/2 h-full justify-evenly">
                    <p class="text-center">Suppliers</p>
                    <h3 class="text-2xl font-bold text-center">{{ $supplierCount }}</h3>
                </span>
            </div>
        </div>
        <div class="w-[1px] h-5/6 border-[1px] border-black max-md:w-5/6"></div>

        <!-- Items Count -->
        <div class="flex flex-col items-center justify-center w-1/4 h-full max-md:w-full">
            <div class="flex max-md:items-center">
                <img src="{{ asset('images/dash/purchases.png') }}" alt="card-img" class="w-1/2">
                <span class="flex flex-col w-1/2 h-full justify-evenly">
                    <p class="text-center">Items</p>
                    <h3 class="text-2xl font-bold text-center">{{ $itemCount }}</h3>
                </span>
            </div>
        </div>
        <div class="w-[1px] h-5/6 border-[1px] border-black max-md:w-5/6"></div>

        <!-- Sales Invoices Count -->
        <div class="flex flex-col items-center justify-center w-1/4 h-full max-md:w-full">
            <div class="flex max-md:items-center">
                <img src="{{ asset('images/dash/invoice.png') }}" alt="card-img" class="w-1/2">
                <span class="flex flex-col w-1/2 h-full justify-evenly">
                    <p class="text-center">Sales Invoice</p>
                    <h3 class="text-2xl font-bold text-center">{{ $invoiceCount }}</h3>
                </span>
            </div>
        </div>
    </div>
</div>
    

    
    <!--chart + table-->
    <div class="h-fit">
        <!--btns-->
        <div class="flex justify-end gap-3 px-12 py-2 max-sm:px-6">
            <button id="chartBtn" class="border-black border-[1px] bg-black text-white p-3 rounded-lg">
                Sales Chart
            </button>
            <button id="tableBtn" class="border-black border-[1px] p-3 rounded-lg">Stock Alert</button>
        </div>
        <!--chart/table container-->
        <div class="w-full px-12 py-5 max-sm:px-6">
            <!--chart-->
            <div id="chart" class="flex flex-col w-full">
    <h1 class="pb-5 text-2xl">Sales Chart</h1>
    <!--chart from flowbite-->
                <div class="w-full h-full bg-white rounded-lg shadow">
                <div class="flex justify-between p-4 pb-0 md:p-6 md:pb-0">
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-black text-center">
                            Sales Per Month
                        </div>
                    </div>
    <div id="labels-chart" class="px-2.5"></div>
                    <div id="labels-chart" class="px-2.5"></div>
                </div>
            </div>
            <!--table-->
            <div id="table" class="hidden bg-white lg:h-[300px] overflow-y-auto">
                <!--table from flowbite-->
                <div class="relative">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
    <thead class="text-xs text-white uppercase bg-[{{ $settings[7]->value}}]">
        <tr>
            <th scope="col" class="px-6 py-3 rounded-tl-lg">
                #
            </th>
            <th scope="col" class="px-6 py-3">
                Item Name
            </th>
            <th scope="col" class="px-6 py-3">
                Current Stock
            </th>
            <th scope="col" class="px-6 py-3 rounded-tr-lg">
                Minimum Quantity
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr class="{{ $item->quantity < $item->minimum_qty ? 'bg-red-100' : '' }}">
                <td class="px-6 py-3">
                    {{ $loop->iteration }} <!-- This gives the row number -->
                </td>
                <td class="px-6 py-3">
                    {{ $item->item_name }} <!-- Display the item name -->
                </td>
                <td class="px-6 py-3">
                    {{ $item->quantity }} <!-- Display the current stock -->
                </td>
                <td class="px-6 py-3">
                    {{ $item->minimum_qty }} <!-- Display the minimum quantity -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>




                </div>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')

<script>
    // for toggling chart/table
    const chartBtn = document.getElementById("chartBtn");
    const tableBtn = document.getElementById("tableBtn");

    const chart = document.getElementById("chart");
    const table = document.getElementById("table");

    chartBtn.addEventListener("click", event => {
        chartBtn.style.backgroundColor = "black";
        chartBtn.style.color = "white";
        tableBtn.style.backgroundColor = "white";
        tableBtn.style.color = "black";
        chart.style.display = "block";
        table.style.display = "none";
    })

    tableBtn.addEventListener("click", event => {
        chartBtn.style.backgroundColor = "white";
        chartBtn.style.color = "black";
        tableBtn.style.backgroundColor = "black";
        tableBtn.style.color = "white";
        table.style.display = "block";
        chart.style.display = "none";
    })

    // for flowbite chart
    // Pass the PHP monthly sales data to JavaScript
    const monthlySalesData = @json($monthlySales);

    // ApexCharts options
    const options = {
        // X-axis configuration
        xaxis: {
            show: true,
            categories: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        // Y-axis configuration
        yaxis: {
            show: true,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500'
                },
                formatter: function (value) {
                    return 'Rs.' + value.toFixed(2);  // Format as currency with two decimal places
                }
            }
        },
        // Series data (use the monthly sales data passed from PHP)
        series: [
            {
                name: "Sales",
                data: monthlySalesData,  // Monthly sales data passed from the controller
                color: "#1A56DB",
            },
        ],
        // Chart configuration
        chart: {
            sparkline: {
                enabled: false
            },
            height: "100%",
            width: "100%",
            type: "area",  // Area chart
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        // Tooltip configuration
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        // Fill configuration (gradient)
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },
        // Data labels (disabled)
        dataLabels: {
            enabled: false,
        },
        // Line stroke configuration
        stroke: {
            width: 6,  // Line width
            curve: 'smooth',  // Smooth curve for the line
        },
        // Legend configuration
        legend: {
            show: false,
        },
        // Grid configuration
        grid: {
            show: false,  // No grid lines
        },
    }

    // Render the chart
    if (document.getElementById("labels-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("labels-chart"), options);
        chart.render();
    }
</script>

</html>