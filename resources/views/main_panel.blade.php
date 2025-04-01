<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings[6]->value}} | Main Panel</title>
    <link rel="icon" href="./{{ $settings[13]->value}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/common.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body class="h-dvh max-md:h-fit">
    <!--Nav-->
    <div
        class="nav bg-[{{ $settings[7]->value}}] w-full h-1/6 max-lg:h-[17dvh] max-sm:py-6  flex justify-between items-center max-sm:justify-center">
        <!-- Image on the Left -->
        <div class="flex items-center max-sm:hidden">
            <img src="{{ asset('' . $siteSetting->company_logo) }}" alt="Logo"
                class="w-full h-16 ml-32 max-sm:w-12 max-sm:h-12"
                style="border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        </div>

        <!-- Right Section -->
        <span class="flex items-center gap-3 sm:mr-20">
            <!-- Logged User -->
            <h3 class="text-2xl text-[{{ $settings[15]->value}}] max-sm:text-sm max-sm:mr-0">
                Welcome {{ $siteSetting->site_name }}
            </h3>
            <!-- Log Out Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="rounded-full w-[50px] aspect-square bg-white flex justify-center items-center hover:scale-90 transition-all mt-5">
                    <i class="text-xl font-bold text-[{{ $settings[14]->value}}] fas fa-sign-out-alt"></i>
                </button>

            </form>
        </span>
    </div>



    </button>
    </div><br />
    {{-- Validation Errors Summary --}}
    @if ($errors->any())
        <div class="relative w-1/2 px-4 py-3 mx-auto mb-4 text-center text-red-700 border border-red-400 rounded bg-red-50"
            role="alert">
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
        <div class="relative w-1/2 px-4 py-3 mx-auto mb-4 text-center text-green-700 bg-green-100 border border-green-400 rounded"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="relative w-1/2 px-4 py-3 mx-auto mb-4 text-center text-red-700 bg-red-100 border border-red-400 rounded"
            role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif


    <!--center-->
    <div class="grid w-full place-items-center h-5/6">
        <!--Main Panel (for max-lg)-->
        <div
            class="hidden grid-cols-1 gap-4 gap-6 px-12 py-6 text-white max-lg:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 w-fit h-fit">

            @if (has_permission(17))
                <a href="{{ asset('dash/dash') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/dash.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Dashboard</p>
                    </div>
                </a>
            @endif

            @if (has_permission(18))
                <a href="{{ asset('sales/billing') }}" target="_blank">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/billing.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Billing</p>
                    </div>
                </a>
            @endif

            @if (has_permission(19))
                <a href="{{ asset('item/item') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/items.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Items</p>
                    </div>
                </a>
            @endif

            @if (has_permission(20))
                <a href="{{ asset('stock/stock') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/stock.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Stock</p>
                    </div>
                </a>
            @endif

            @if (has_permission(21))
                <a href="{{ asset('sales/sales') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/sales.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Sales</p>
                    </div>
                </a>
            @endif


            



            @if (has_permission(22))
                <a href="{{ asset('users/users') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/users.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Users</p>
                    </div>
                </a>
            @endif

            @if (has_permission(23))
                <a href="{{ asset('customers/customers') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/customer.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Customer</p>
                    </div>
                </a>
            @endif

            @if (has_permission(24))
                <a href="{{ asset('suppliers/suppliers') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/suppliers.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Suppliers</p>
                    </div>
                </a>
            @endif



            @if (has_permission(26))
                <a href="{{ asset('reports/reports') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/reports.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Reports</p>
                    </div>
                </a>
            @endif

            @if (has_permission(27))
                <a href="{{ asset('settings/settings') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/main-panel/btn-icons/settings.svg"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Settings</p>
                    </div>
                </a>
            @endif
            
            @if (has_permission(83))
                <a href="{{ asset('reports/stockReports') }}">
                    <div
                        class="w-[200px] max-lg:w-[150px] h-[200px] max-lg:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                        <img src="../images/reports/ItemStockReport.png"
                            class="w-[105px] h-[105px] max-lg:w-[70px] max-lg:h-[70px]" alt="">
                        <p>Stock Report</p>
                    </div>
                </a>
            @endif



        </div>
        <!--Main Panel (for lg)-->
        <div class="hidden lg:grid place-items-center">
            <div class="grid grid-cols-5 gap-4 gap-6 px-12 py-3 text-white w-fit h-fit">
                @if (has_permission(17))
                    <a href="{{ asset('dash/dash') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/dash.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Dashboard</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(18))
                    <a href="{{ asset('sales/billing') }}" target="_blank">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/billing.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Billing</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(19))
                    <a href="{{ asset('item/item') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/items.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Items</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(20))
                    <a href="{{ asset('stock/stock') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/stock.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Stock</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(21))
                    <a href="{{ asset('sales/sales') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/sales.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Sales</p>
                        </div>
                    </a>
                @endif


            </div>
            <div class="grid grid-cols-4 gap-4 gap-6 px-12 py-3 text-white w-fit h-fit">

            
                @if (has_permission(22))
                    <a href="{{ asset('users/users') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/users.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Users</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(23))
                    <a href="{{ asset('customers/customers') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/customer.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Customer</p>
                        </div>
                    </a>
                @endif


                @if (has_permission(24))
                    <a href="{{ asset('suppliers/suppliers') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/suppliers.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Suppliers</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(26))
                    <a href="{{ asset('reports/reports') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/reports.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Reports</p>
                        </div>
                    </a>
                @endif


            </div>
            <div class="grid grid-cols-2 gap-4 gap-6 px-12 py-3 text-white w-fit h-fit">



                @if (has_permission(27))
                    <a href="{{ asset('settings/settings') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/main-panel/btn-icons/settings.svg"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Settings</p>
                        </div>
                    </a>
                @endif

                @if (has_permission(83))
                    <a href="{{ asset('reports/stockReports') }}">
                        <div
                            class="w-[200px] max-xl:w-[150px] h-[200px] max-xl:h-[150px] bg-[{{ $settings[7]->value}}] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer uppercase lg:text-xl">
                            <img src="../images/reports/ItemStockReport.png"
                                class="w-[105px] h-[105px] max-xl:w-[70px] max-xl:h-[70px]" alt="">
                            <p>Stock Report</p>
                        </div>
                    </a>
                @endif
                


                

            </div>
        </div>
    </div>
</body>
<script>
    function locatePanelItem(panelItem) {
        window.location.href = "../main-panel/" + panelItem;
    }
</script>


<script>
    // Auto-hide alert messages after 4 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const alerts = document.querySelectorAll('.relative[role="alert"]');
            alerts.forEach(alert => alert.style.display = 'none');
        }, 4000); // 4000 milliseconds = 4 seconds
    });
</script>


</html>
