<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <script src="../../resources/js/dashboard.js" defer></script> --}}
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @yield('link')

</head>

<body>
    <div class=" w-full h-screen  flex">
        <div class="sideBar h-full  bg-purple-100 shrink w-80 py-8 px-4 relative">
            <div class="flex items-center gap-x-3">
                <img src="{{ asset('storage/admin/logo.jpg') }}" alt="" class="w-9 rounded-md">
                <span class="text-xl font-bold block w-full"> Admin Panel</span>
            </div>
            <a class="mt-10  flex gap-x-4 p-2 rounded-md hover:text-indigo-400" id="item"
                href="{{ route('item') }}">
                <svg viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-6"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>item-details</title>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon" fill="#000" transform="translate(42.666667, 85.333333)">
                                <path
                                    d="M426.666667,1.42108547e-14 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L426.666667,1.42108547e-14 Z M384,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,42.6666667 Z M341.333333,213.333333 L341.333333,245.333333 L234.666667,245.333333 L234.666667,213.333333 L341.333333,213.333333 Z M341.333333,149.333333 L341.333333,181.333333 L234.666667,181.333333 L234.666667,149.333333 L341.333333,149.333333 Z M192,85.3333333 L192,170.666667 L85.3333333,170.666667 L85.3333333,85.3333333 L192,85.3333333 Z M341.333333,85.3333333 L341.333333,117.333333 L234.666667,117.333333 L234.666667,85.3333333 L341.333333,85.3333333 Z"
                                    id="Combined-Shape"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="text-md">Item</span>
            </a>
            <a class=" mt-3 flex gap-x-4  p-2 rounded-md  hover:text-indigo-400" href="{{ route('category') }}"
                id="category">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M7 8H21M7 12H21M7 16H21M3 8H3.01M3 12H3.01M3 16H3.01" stroke="black" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <span class="text-md">Category</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class=" mt-3 flex gap-x-4  p-2 rounded-md mb-5  absolute bottom-0 hover:text-indigo-400"
                    type="submit">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M17.4399 14.62L19.9999 12.06L17.4399 9.5" stroke="#292D32" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M9.76001 12.0601H19.93" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.76 20C7.34001 20 3.76001 17 3.76001 12C3.76001 7 7.34001 4 11.76 4"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span class="text-sm font-bold">Logout</span>
                </button>
            </form>
        </div>
        <div class="panel w-full h-full   ">
            <div class="pf-bar px-5 py-3 shadow-sm flex justify-between items-center ">
                <img src="{{ asset('storage/admin/bars.png') }}" alt=""
                    class="cursor-pointer w-5 aspect-square block ">
                <div
                    class="cursor-pointer w-10 aspect-square grid rounded-full bg-indigo-600 place-items-center  text-white">
                    @php
                        $str = Auth::user()->name;
                        $result = $str[0] . $str[1];
                    @endphp
                    {{ $result }}
                </div>
            </div>
            <div>@yield('content')</div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
{{-- <script>
    $(document).ready(function() {
        $("#item").click(function() {
            $('#item').addClass('bg-purple-500')
        });
    });
</script> --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script> --}}

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script></script>


@yield('scriptSource')

</html>
