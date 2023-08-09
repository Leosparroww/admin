@extends('layouts.main')
@section('content')
    <div class="py-5 px-5">
        <div>
            <a class=" font-bold text-sm hover:text-indigo-400" href="{{ route('item') }}"> Item List</a>
        </div>
        <div class="text-right">
            <a href="{{ route('item#createPage') }}"
                class="bg-indigo-600 text-white px-3 py-2 rounded-md flex gap-2 w-max float-right hover:bg-indigo-700 items-center">
                <span class="text-xl">+</span>
                <span class="text-sm">Add items</span></a>
        </div>

    </div>
    <div class="py-5 px-5 ">
        <div>Show&ensp;:&ensp;&ensp;<select name="" id="" class="px-3 py-2 border rounded-lg">
                <option value="10">10 rows</option>
                <option value="20">20 rows</option>
                <option value="30">30 rows</option>
            </select> </div>
        <table class="table-auto w-full text-center  mt-5">
            <thead class="bg-indigo-500  text-white">
                <tr>
                    <th class=" py-2">Action</th>
                    <th class=" py-2">No</th>
                    <th class=" py-2">Item</th>
                    <th class=" py-2 ">Category</th>
                    <th class=" py-2">Description</th>
                    <th class=" py-2">Price</th>
                    <th class=" py-2">Owner</th>
                    <th class=" py-2">Publish</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $i)
                    <tr class="border-b">
                        <td class=" py-2 flex items-center justify-center gap-3">
                            <a class="bg-green-400 hover:bg-green-600 w-7 aspect-square p-1 rounded-md">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z"
                                            fill="#ffffff"></path>
                                    </g>
                                </svg>
                            </a>
                            <button
                                class="inline-block bg-red-400 hover:bg-red-600 w-7 aspect-square p-1 rounded-md  delete-btn"
                                id="">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                    </g>
                                </svg>
                            </button>
                        </td>
                        <td class=" py-2 id">{{ $i->id }}</td>
                        <td class=" py-2">{{ $i->name }}</td>
                        <td class=" py-2">{{ $i->categoryName }}</td>
                        <td class=" py-2 w-3/6">

                            {{-- @php
                                strip_tags($i->description);
                                $r = ;
                            @endphp --}}
                            {!! $i->description !!}
                        </td>
                        <td class=" py-2">{{ $i->price }} kyats</td>
                        <td class=" py-2">{{ $i->owner }}</td>
                        <td class=" py-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="{{ $i->publish }}" @checked($i->publish == 1)
                                    class="sr-only peer publish">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $item->links() }}

    </div>
@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('[aria-current="page"] span').addClass('bg-red-200')
            $('.delete-btn').on('click', function() {
                $itemId = $(this).closest('tr').find('.id').text();
                $(this).closest('tr').remove();
                $.ajax({
                    type: 'get',
                    url: '/item/ajax/delete',
                    data: {
                        'id': $itemId,
                    },

                })
            })
            $('.publish').on('change', function() {
                $publish = this.checked ? 1 : 0
                $itemId = $(this).closest('tr').find('.id').text();
                $.ajax({
                    type: 'get',
                    url: '/item/ajax/publish',
                    data: {
                        'status': $publish,
                        'id': $itemId
                    },
                    success: function(response) {
                        console.log(response);
                    }
                })
            })
            $('#item').addClass('bg-indigo-500 text-white hover:text-slate-50')
            $('#item #icon').css({
                "fill": "white",
            })
        })
    </script>
@endsection
