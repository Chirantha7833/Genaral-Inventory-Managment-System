<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">

<div class="flex">
    <div class="my-auto">
    <h1 class="text-[50px] font-bold m-2">Register <br> Suppliers</h1>
    <a href="/registerdsuppliers" class="m-2">View List</a>
    </div>

<form action="{{ url('/registersuppliers') }}" method="post" class="bg-black rounded-[20px] h-[580px] w-[500px] text-center mx-auto mt-5">
        @csrf 
        <div class="flex">
        <div class="flex flex-col ml-10">
                <label for="name" class="mt-10 p-2">Supplier Name</label> 
                <label for="address" class="mt-10 p-2">Address</label>
                <label for="phone" class="mt-10 p-2">Phone</label>
                <label for="date" class="mt-10 p-2">Date</label>
                <label for="description" class="mt-10 p-2">Description</label>

            </div>
   
            <div class="flex flex-col text-center">
            <input name="name" type="text" class="mt-10 ml-5 text-black border-0 outline-none p-2 rounded-[8px]">   
            <input name="address" type="text" class="mt-10 ml-5 text-black border-0 outline-none p-2 rounded-[8px]">   
            <input name="phone" type="text" class="mt-10 ml-5 text-black border-0 outline-none p-2 rounded-[8px]">   
            <input name="date" type="date" class="mt-10 ml-5 text-black border-0 outline-none p-2 rounded-[8px]">
            <textarea name="description" type="textarea" class="mt-10 ml-5 text-black border-0 outline-none p-2 rounded-[8px]"></textarea>
            </div>
        </div>
             

        <button type="submit" class="cursor-pointer bg-slate-700 p-2 rounded-[8px] hover:bg-[#1a1a1a] mt-5 mb-2">Register</button>
    </form>
</div>

</div>
</div>
</body>
</html>