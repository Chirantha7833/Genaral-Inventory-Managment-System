<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1a1a1a] text-white p-10 text-center">
    <h1 class="text-[50px] font-bold mb-10">Welcome To Inventory</h1>
    <div class="flex justify-center">
    @if (Route::has('login'))
                <div class="flex items-center">
                    @auth
                        <a href="{{ url('/viewdashboard') }}" class=""> <div class="w-[120px] hover:bg-black hover:text-white hover:border-2 bg-black m-5 p-5 cursor-pointer rounded-[25px]">Dashboard</div></a>
                    @else
                        <a href="{{ route('login') }}" class=""><div class="w-[120px] hover:bg-black hover:text-white hover:border-2 bg-black m-5 p-5 cursor-pointer rounded-[25px]">Log in</div></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=""><div class="w-[120px] hover:bg-black hover:text-white hover:border-2 bg-black m-5 p-5 cursor-pointer rounded-[25px]">Register</div></a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
</body>
</html>