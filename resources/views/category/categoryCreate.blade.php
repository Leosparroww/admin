@extends('layouts.main')

@section('content')
    <div class="py-5 px-5">
        <div class="flex items-center">
            <a class=" font-bold text-sm hover:text-indigo-400" href="{{ route('category') }}"> Category List</a>
            &ensp;&#x276F;&ensp;
            <a class="text-indigo-600 font-bold text-sm" href="#"> Create Category</a>
        </div>
        <div class="w-full h-max  rounded-lg bg-slate-50 shadow-md pb-5 mt-4">
            <form action="{{ route('category#create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="bg-indigo-100 p-3  rounded-t-lg">Add category</h1>
                <div class="md:grid grid-cols-2 gap-20">
                    <div class="p-3 ">
                        <div class="my-4">
                            <label for="" class="block my-2 ">Category Name<span
                                    class="text-red-600">*</span></label>
                            <input type="text" class="w-full h-8 border focus:outline-indigo-500 px-2 rounded-sm"
                                placeholder="Category name" name="categoryName">
                            @error('categoryName')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="my-4 relative">
                            <label for="" class="block my-2 ">Category Photo</label>
                            <label for="fileUpload" id="file-label"
                                class="flex flex-col border border-dotted w-full h-max p-8 justify-center items-center text-slate-400 gap-2 relative">

                                <img src="{{ asset('storage/admin/upload.png') }}" alt="" class="w-8">
                                <span>Drag and Upload Here</span>
                                <span>or</span>
                                <div
                                    class="bg-indigo-600 px-3 py-2 rounded-md text-white cursor-pointer hover:bg-indigo-700">
                                    Choose file</div>

                            </label>
                            <input type="file" name="categoryImg" id="file-upload"
                                class="w-full  border focus:outline-indigo-500 px-2 rounded-sm text-center  absolute h-full inset-0 opacity-0">
                            @error('categoryImg')
                                <small class="text-red-700">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="my-4">
                            <label for="" class="block my-2 ">Status</label>
                            <input type="checkbox" id="publishCheck" value="true" checked>
                            <input type="text" value="1" id="publish" hidden name="publish"> Publish
                        </div>
                    </div>
                </div>
                <div class="flex justify-end p-3 gap-10 items-center">
                    <a href="" class="text-indigo-500 hover:text-indigo-400">Cancel</a>
                    <button class="rounded-lg px-6 py-2 bg-indigo-500 text-white text-bold hover:bg-indigo-800"
                        type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scriptSource')
    <script>
        var fileUpload = document.getElementById('file-upload')
        var fileLabel = document.getElementById('file-label')
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
            $('#publishCheck').change(function() {
                if (this.checked) {
                    $('#publish').attr('value', 1);
                } else {
                    $('#publish').attr('value', 0);
                }
            })
        });
    </script>
@endsection
