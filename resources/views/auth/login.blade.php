<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>

    <div class="w-full h-screen grid place-items-center">
        <div class=" w-full max-w-md  max-h-max p-8 rounded-lg shadow-md

">
            <div class="w-full my-3"><img src="{{ asset('storage/admin/logo.jpg') }}"
                    class="w-2/12 block mx-auto rounded-lg" alt="">
            </div>
            <h2 class="font-bold text-3xl text-center"> Log in to your account</h2>
            <div class="text-slate-500 text-center mt-5">Welcome back !</div>
            <form action="{{ route('login') }}" class=" mt-5" method="post">
                @csrf
                <div class="flex flex-col gap-3">
                    <label for="email" class="font-bold">Email</label>
                    <input type="email" name="email" id="" class="rounded border h-9 p-3">
                </div>
                <div class="relative flex flex-col gap-3 mt-5">
                    <label for="password" class="font-bold">Password</label>
                    <input type="password" name="password" id="password" class="rounded border h-9 p-3 ">
                    <img src="{{ asset('storage/admin/eye.png') }}" alt="" id="imgEye"
                        class="w-5 absolute bottom-2 right-2 cursor-pointer"
                        onclick="

                        const img = document.getElementById('imgEye')
                        const password =document.getElementById('password')
                                if (password.type === 'password') {
                                    password.type = 'text';
                                    img.src = '{{ asset('storage/admin/eye-close-up.png') }}'
                                } else {
                                    password.type = 'password'
                                       img.src = '{{ asset('storage/admin/eye.png') }}'
                                } ">
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:text-blue-700 hover:bg-slate-400 text-white font-bold py-2 px-4 rounded mt-8 my-5 w-full">ds</button>
            </form>
        </div>
    </div>
</body>

</html>
