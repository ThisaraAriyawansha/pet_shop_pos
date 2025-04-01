<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings[6]->value}} | Items</title>
    <link rel="icon" href="../{{ $settings[13]->value}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../../styles/common.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .clicked {
            background-color: green !important;
            color: white !important;
        }
         /* Loading overlay styles */
         .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        #custom-alert {
        display: none; /* Hidden by default */
        }
        #custom-alert.show {
            display: flex; /* Show the modal when the `show` class is added */
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #ccc;
            border-top-color: #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Styling for the fetched data */
        #data-container {
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<script>
    // Initialize an array to hold all rows' data
    let allData = [];
</script>
<body class="h-dvh max-lg:h-fit" onload="allPriceCalc();">
    <!--Nav-->
    <div
        class="nav bg-[{{ $settings[7]->value}}] w-full h-[10%] max-lg:h-[17dvh] max-sm:py-6  flex justify-between items-center max-lg:justify-center max-lg:flex-col">
        <span class="flex items-center gap-3 ml-20 max-lg:ml-0 max-sm:scale-75">
        <button onclick="history.go(-1);"
            class="rounded-full w-[50px] aspect-square bg-white flex justify-center items-center hover:scale-90 transition-all">
            <span class="text-4xl font-bold text-[{{ $settings[14]->value}}]">&lt;</span>
        </button>


            <button onclick="window.location.href = '/dashboard';"
                class="p-2 text-[{{ $settings[14]->value}}] rounded-lg bg-white flex gap-3 justify-center items-center hover:scale-90 transition-all">
                <i class="text-xl text-[{{ $settings[14]->value}}] fas fa-city"></i>
                Go to Main Panel
            </button>
        </span>
        <span class="flex items-center gap-3 mr-20 max-lg:mr-0 max-sm:scale-75">
            <!--Logged User-->
            <h3 class="text-2xl text-[{{ $settings[15]->value}}] max-md:text-sm">
            Welcome {{ $siteSetting->site_name }}
            </h3>
            <!--log out btn-->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="rounded-full w-[50px] aspect-square bg-white flex justify-center items-center hover:scale-90 transition-all mt-5">
                    <i class="text-xl font-bold text-[{{ $settings[14]->value}}] fas fa-sign-out-alt"></i>
                    </button>

            </form>
        </span>
    </div>
