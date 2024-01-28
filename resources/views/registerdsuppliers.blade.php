<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Suppliers</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">
<div class="mx-auto p-2 text-center">
    <h1 class="font-bold text-[40px] m-2">Registerd Suppliers</h1>
    <a href="/suppliers" class=" hover:no-underline"><h1 class=" bg-slate-700 p-2 rounded-md mt-15 hover:bg-slate-900 hover:text-white">Register A New Supplier</h1></a>
</div>
            <table class="m-5 rounded-sm">
                <tr class="bg-slate-900"> 
                <th class="font-bold text-center p-2 text-amber-400">ID</th>
                <th class="font-bold text-center p-2 text-amber-400">Name</th>
                <th class="font-bold text-center p-2 text-amber-400">Address</th>
                <th class="font-bold text-center p-2 text-amber-400">Phone</th>
                <th class="font-bold text-center p-2 text-amber-400">Date</th>
                <th class="font-bold text-center p-2 text-amber-400">Description</th>
                </tr>
                @foreach($suppliers as $supplier)
                <tr class="bg-slate-900">
                    <td>{{ $supplier->id }}</td>
                    <td>
                        <a href="/buypage/{{ $supplier->id }}?name={{ $supplier->name }}">{{ $supplier->name }}</a>
                    </td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->date }}</td>
                    <td>{{ $supplier->description }}</td>
                    <td class="bg-red-600 text-center p-2 rounded-md hover:bg-red-800 cursor-pointer">
                    <form action="/deletesupplier" method="GET">
                        <input type="hidden" name="id" value="{{$supplier->id}}">
                        <input type="submit" name="" id="delete" class="button" value="Delete">
                    </form>
                </td>
                </tr>
                @endforeach
            </table>
</div>

</div>
</div>
</body>
</html>