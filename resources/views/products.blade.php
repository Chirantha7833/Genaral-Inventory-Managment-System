<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">
<div class="mx-auto p-2 text-center">
    <h1 class="font-bold text-[40px] m-2">Products</h1>
    <a href="/customers" class=" hover:no-underline"><h1 class=" bg-slate-700 p-2 rounded-md mt-15 hover:bg-slate-900 hover:text-white">Register A New Customer</h1></a>
</div>
    <table border="1" class="m-5">
        
            <tr class="m-2 bg-slate-900">
                <th class="font-bold text-center p-2 text-amber-400">Date</th>
                <th class="font-bold text-center p-2 text-amber-400">Product ID</th>
                <th class="font-bold text-center p-2 text-amber-400">Product Name</th>
            </tr>
        
            @foreach($data as $item)
                <tr class="m-2  bg-slate-900">
                    <td class="p-2">{{ $item->date }}</td>
                    <td class="p-2">{{ $item->product_id }}</td>
                    <td class="p-2">{{ $item->product_name }}</td>
                    <td class="bg-red-600 text-center p-2 rounded-md hover:bg-red-800 cursor-pointer">
                    <form action="/deleteproduct" method="GET">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="submit" name="" id="delete" class="button" value="Delete">
                    </form>
                </tr>
            @endforeach
        
    </table>
</div>
</div>

</div>
</div>
</body>
</html>