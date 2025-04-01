@include('layouts.header')
    <div class="flex flex-col items-center h-5/6">
      <!--breadcrumbs-->
      <div class="w-full px-12 py-5 max-sm:px-6">
        <nav class="flex" aria-label="Breadcrumb">
          <ol
            class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
          >
            <li class="inline-flex items-center">
              <p
                class="inline-flex items-center text-sm font-medium text-gray-700"
              >
                <svg
                  class="w-3 h-3 me-2.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"
                  />
                </svg>
                Main Panel
              </p>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg
                  class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 6 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 9 4-4-4-4"
                  />
                </svg>
                <p class="text-sm font-medium text-gray-700 ms-1 md:ms-2">
                  Sales
                </p>
              </div>
            </li>
          </ol>
        </nav>
      </div>
      <!--Button container-->
      <div class="h-full w-fit">
        <!--buttons-->
        <div
          class="grid grid-cols-2 place-content-center justify-items-center h-full gap-6 text-white 2xl:scale-[110%] "
        >
        @if(has_permission(60))
        <a href="{{ asset('sales/billing')}}">
          <div
            class="w-[200px] max-lg:w-[150px] max-sm:w-[100px] border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px] max-sm:h-[100px] bg-[#1b4f72] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all hidden"
          >
            <div
              class="w-10 h-10"
              style="
                background: url('{{ asset('images/sales/billing.png') }}')
                  no-repeat;
                background-size: cover;
              "
            ></div>
            <p class="text-center max-sm:text-sm">Billing</p>
          </div>
          </a>
          @endif

          @if(has_permission(61))
          <div
            onclick="locatePanelItem('salesReturn');"
            class="w-[200px] max-lg:w-[150px] max-sm:w-[100px] border-2 border-[#1b4f72] h-[200px] max-lg:h-[150px] max-sm:h-[100px] bg-white text-[#1b4f72] rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all hidden"
          >
            <div
              class="w-10 h-10"
              style="
                background: url('{{ asset('images/sales/sales_ret.png') }}')
                  no-repeat;
                background-size: cover;
              "
            ></div>
            <p class="text-center max-sm:text-sm">Add Sales Returns</p>
          </div>
          @endif

          @if(has_permission(62))
          <a href="{{ asset('sales/salesItems')}}">
          <div
            class="w-[200px] max-lg:w-[150px] max-sm:w-[100px] border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px] max-sm:h-[100px] bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all"
          >
            <div
              class="w-10 h-10"
              style="
                background: url('{{ asset('images/sales/salesItemList.png') }}')
                  no-repeat;
                background-size: cover;
              "
            ></div>
            <p class="text-center max-sm:text-sm">Sales Items List</p>
          </div>
          </a>
          @endif

          @if(has_permission(63))
          <a href="{{ asset('sales/salesReturnList')}}">
          <div
            class="w-[200px] max-lg:w-[150px] max-sm:w-[100px] border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px] max-sm:h-[100px] bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all"
          >
            <div
              class="w-10 h-10"
              style="
                background: url('{{ asset('images/sales/salesReturnList.png') }}')
                  no-repeat;
                background-size: contain;
                background-position: center;
              "
            ></div>
            <p class="text-center max-sm:text-sm">Sales Returns List</p>
          </div>
          </a>
          @endif

          @if(has_permission(65))
          <a href="{{ asset('sales/ReturnListView')}}">
          <div
            class="w-[200px] max-lg:w-[150px] max-sm:w-[100px] border-2 border-[{{ $settings[7]->value}}] h-[200px] max-lg:h-[150px] max-sm:h-[100px] bg-[{{ $settings[7]->value}}] text-white rounded-lg flex flex-col gap-3 justify-center items-center hover:scale-90 transition-all"
          >
            <div
              class="w-10 h-10"
              style="
                background: url('{{ asset('images/sales/returnLiistView.png') }}')
                  no-repeat;
                background-size: contain;
                background-position: center;
              "
            ></div>
            <p class="text-center max-sm:text-sm">Returns List View</p>
          </div>
          </a>
          @endif

          
        </div>
      </div>
    </div>

  </body>
  @include('layouts.footer')

  <script>
    function locatePanelItem(panelItem) {
      window.location.href = "../../main-panel/sales/" + panelItem;
    }
  </script>
</html>