<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">
<div class="mx-auto p-2 text-center">
    <h1 class="font-bold text-[40px] m-2">Main Cash Book</h1>
</div>
<div class="flex">
    <div class=" bg-black h-[500px] rounded-md">
        <ul class="">
        <li class="m-5">
                <a href="/reports" class="text-blue-500 hover:underline">Cash Book</a>
            </li>
            <li class="m-5">
                <a href="/revenue" class="text-blue-500 hover:underline">Revenue</a>
            </li>
            <li class="m-5">
                <a href="/expenditure" class="text-blue-500 hover:underline">Expenditure</a>
            </li>
            <li class="m-5">
                <a href="/profit" class="text-blue-500 hover:underline">Profit</a>
            </li>
            <li class="m-5">
                <a href="/loss" class="text-blue-500 hover:underline">Loss</a>
            </li>
        </ul>
    </div>
    <div>
    <table border="1" class="m-5">
            <tr class="m-2 bg-slate-900">
                
                <th class="font-bold text-center p-2 text-amber-400">Date</th>
                <th class="font-bold text-center p-2 text-amber-400">Trancsaction No</th>
                <th class="font-bold text-center p-2 text-amber-400">Description</th>
                <th class="font-bold text-center p-2 text-amber-400">Revenue</th>
                <th class="font-bold text-center p-2 text-amber-400">Expenditure</th>
                <th class="font-bold text-center p-2 text-amber-400">Balance</th>
                <!-- Add more columns as needed -->
            </tr>
            @foreach($data as $item)
                <tr class="m-2 bg-slate-900">
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->trn_no }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->revenue }}</td>
                    <td>{{ $item->expenditure }}</td>
                    <td>{{ $item->balance }}</td>
                    <!-- Add more cells for additional columns -->
                </tr>
            @endforeach
    </div>
</div>
</div>
</div>

</div>
</div>
</body>
</html>