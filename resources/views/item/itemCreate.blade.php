@extends('layouts.main')

@section('content')
    <div class="py-5 px-5">
        <div class="flex items-center">
            <a class=" font-bold text-sm hover:text-indigo-400" href="{{ route('item') }}"> Item List</a>
            &ensp;&#x276F;&ensp;
            <a class="text-indigo-600 font-bold text-sm" href="#"> Create item</a>
        </div>
        <div class="w-full h-max  rounded-lg bg-slate-50 shadow-md pb-5 mt-4">
            <h1 class="bg-indigo-100 p-3  rounded-t-lg">Add Item</h1>
            <form action="{{ route('item#create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md:grid grid-cols-2 gap-20">
                    <div class="p-3 ">
                        <h2 class="font-bold text-lg mb-5">Item information</h2>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Item Name<span class="text-red-600">*</span></label>
                            <input type="text" name="itemName"
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm" placeholder="Item name">
                            @error('itemName')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Select Category<span
                                    class="text-red-600">*</span></label>
                            <select name="category" id=""
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm text-slate-400">
                                <option value="" selected hidden>Select Category</option>
                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}" class="text-black">{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Price<span class="text-red-600">*</span></label>
                            <input type="number" name="price"
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm"
                                placeholder="Enter Price">
                            @error('price')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Decription<span class="text-red-600">*</span></label>
                            <div id="editor" class="w-full h-20 border focus:outline-none  px-2 rounded-sm">

                            </div>
                            <input type="text" id="description" name="description" hidden>
                            @error('description')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Select Item Condition</label>
                            <select name="itemCondition" id=""
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm text-slate-400">
                                <option value="" hidden selected>Select
                                    item Condition</option>
                                <option value="new" class="text-black">New</option>
                                <option value="used" class="text-black">Used</option>
                            </select>
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Select Item Type</label>
                            <select name="itemType" id=""
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm text-slate-400">
                                <option value="" hidden selected>Select Item type </option>
                                <option value="buy" class="text-black">Buy</option>
                                <option value="sell" class="text-black">Sell</option>
                                <option value="exchange" class="text-black">Exchange</option>
                            </select>
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Status</label>
                            <input type="checkbox" id="publishCheck" value="true" checked>
                            <input type="text" value="1" id="publish" hidden name="publish"> Publish
                        </div>
                        <div class="my-4 relative">
                            <label for="" class="block my-2 ">Item Photo<span class="text-red-600">*</span></label>
                            <label for="fileUpload" id="file-label"
                                class="flex flex-col border border-dotted w-full h-max p-8 justify-center items-center text-slate-400 gap-2 relative">

                                <img src="{{ asset('storage/admin/upload.png') }}" alt="" class="w-8">
                                <span>Drag and Upload Here</span>
                                <span>or</span>
                                <div
                                    class="bg-indigo-600 px-3 py-2 rounded-md text-white cursor-pointer hover:bg-indigo-700 ">
                                    Choose file</div>


                            </label>
                            <input type="file" name="image" id="file-upload"
                                class="w-full  border focus:outline-indigo-500 px-2 rounded-sm text-center absolute inset-0  h-full  opacity-0">
                            @error('image')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>



                    </div>
                    <div class=" p-3">
                        <h2 class="font-bold text-lg mb-5">Owner information</h2>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Owner Name<span
                                    class="text-red-600">*</span></label>
                            <input type="text" name="ownerName"
                                class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm"
                                placeholder="Input Owner Name">
                            @error('ownerName')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">ph:no</label>
                            <div class="relative inline-block text-left w-full">
                                <div class="flex w-full">
                                    <select type="button" name="phNo1"
                                        class=" w-max  rounded-l-lg bg-white ps-2 pe-2 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">f
                                        <option value="+95">+95</option>
                                        <option value="+971">+971</option>
                                        <option value="+44">+44</option>
                                        <option value="+1">+1</option>
                                        <option value="+1">+1</option>

                                    </select>
                                    <input type="number" placeholder="Add number" name="phNo"
                                        class="bg-white w-full px-3 py-2 text-sm rounded-r-lg font-semibold text-gray-900 shadow-sm ring-1 focus:outline-none ring-inset ring-gray-300 hover:bg-gray-50">
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Address</label>
                            <textarea name="address" id="" rows="4 " placeholder="Enter Address"
                                class="w-full  border focus:outline-indigo-500 p-2 rounded-sm"></textarea>
                        </div>
                        <div class="my-4">
                            <iframe name="f"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15277.507476593084!2d96.18452180000001!3d16.807649799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2smm!4v1691356449936!5m2!1sen!2smm"
                                class="w-full " style="border:0;height: 500px" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end p-3 gap-10 items-center">
                    <a href="" class="text-indigo-500 hover:text-indigo-400">Cancel</a>
                    <button type="submit" id="save"
                        class="rounded-lg px-6 py-2 bg-indigo-500 text-white text-bold hover:bg-indigo-800">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scriptSource')
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector("#save");
        var hiddenInput = document.querySelector('#description');

        form.addEventListener('click', function(e) {

            hiddenInput.value = quill.root.innerHTML;
        });
        // form upload
        var fileUpload = document.getElementById('file-upload')
        var fileLabel = document.getElementById('file-label')

        fileUpload.addEventListener('change', function() {
            console.log('es');
        })
        fileUpload.onchange = () => {
            const selectedFile = fileUpload.files;
            if (selectedFile.length == 0) {
                fileLabel.innerHTML =
                    `  <img src="{{ asset('storage/admin/upload.png') }}" alt="" class="w-8">
                                <span>Drag and Upload Here</span>
                                <span>or</span>
                                <div
                                    class="bg-indigo-600 px-3 py-2 rounded-md text-white cursor-pointer hover:bg-indigo-700">
                                    Choose file</div>

                            `
            } else {
                file = selectedFile[0]
                size = 0;
                if (file.size > 1000 * 1024) {
                    size = (file.size / 1024 / 1024).toFixed(2) + '&ensp;mb'
                } else {
                    size = (file.size / 1024).toFixed(2) + '&ensp;kb'
                }
                fileLabel.innerHTML =
                    ` <div class="flex"> <span class="text-indigo-500">File uploaded</span> &ensp;:&ensp;
                                    <img src="{{ asset('storage/admin/file.png') }}" alt="" class="w-6">
                                </div>
                                   <div class="text-indigo-500 text-sm w-full text-left px-5"><span class="text-black">Name</span>&ensp;-&ensp;${file.name}</div>
                                <div class="text-indigo-500 text-sm w-full text-left px-5"><span class="text-black">size</span>&ensp;-&ensp;${size}</div>
                                `
            }
        }
    </script>
    <script>
        $(document).ready(function() {

            $('#contact-menu').click(function() {

            })
            $('#publishCheck').change(function() {
                if (this.checked) {
                    $('#publish').attr('value', 1);
                } else {
                    $('#publish').attr('value', 0);
                }
            })

        })
    </script>
@endsection
