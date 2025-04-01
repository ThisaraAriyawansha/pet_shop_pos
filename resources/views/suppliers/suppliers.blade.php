@include('layouts.header')
    <div class="h-5/6 max-lg:h-[83vh] flex flex-col items-center">
        <!--breadcrumbs-->
        <div class="w-full px-12 py-5 max-sm:px-6">
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
                            <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">
                                Suppliers
                            </p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <!--Button container-->
        <div class="grid h-full p-6 w-fit place-items-center">
            <!--buttons-->
            <div class="grid gap-6">
                <div
                    class="grid grid-cols-1 place-items-center max-[375px]:grid-cols-1 place-content-center [375px]:justify-items-center h-full gap-6 text-white 2xl:scale-[110%]">
                    
                    @if(has_permission(44))
                    <a href="{{ asset('suppliers/addSupplier')}}">
                    <div 
                        class="w-[200px] max-lg:w-[150px]  border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px]  bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer">
                        <div class="w-10 h-10"
                            style="background: url('{{ asset('images/suppliers/addNewSuppliers.png') }}')no-repeat;background-size: cover;">
                        </div>
                        <p class="text-center max-sm:text-sm">Add New Suppliers</p>
                    </div>
                    </a>
                    @endif
                </div>
                <div
                    class="grid grid-cols-2 max-[375px]:grid-cols-1 place-content-center [375px]:justify-items-center h-full gap-6 text-white 2xl:scale-[110%]">
                    
                    @if(has_permission(45))
                    <a href="{{ asset('suppliers/supplierList')}}">
                    <div 
                        class="w-[200px] max-lg:w-[150px]  border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px]  bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer">
                        <div class="w-20 h-10"
                            style="background: url('{{ asset('images/suppliers/supplier List.png') }}')no-repeat;background-size: cover;">
                        </div>
                        <p class="text-center max-sm:text-sm">Suppliers List</p>
                    </div>
                    </a>
                    @endif
                    
                    @if(has_permission(46))
                    <a href="{{ asset('suppliers/importSupplier')}}">
                    <div 
                        class="w-[200px] max-lg:w-[150px]  border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px]  bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all cursor-pointer">
                        <div class="w-10 h-10"
                            style="background: url('{{ asset('images/suppliers/importSuppliers.png') }}')no-repeat;background-size: cover;">
                        </div>
                        <p class="text-center max-sm:text-sm">Import Suppliers</p>
                    </div>
                    </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</body>
@include('layouts.footer')

<script>
    function locatePanelItem(panelItem) {
        window.location.href = "../../main-panel/suppliers/" + panelItem;
    }
</script>

</html>