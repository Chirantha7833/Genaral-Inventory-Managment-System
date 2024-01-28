<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">
<div class="mx-auto p-2 text-center">
    <h1 class="font-bold text-[40px] m-2">Sell To <h1>Customer ID: {{ $data->id }}</h1><h1>Customer Name: {{ $name }}</h1></h1>
    <a href="/suppliers" class=" hover:no-underline">
        <h1 class=" bg-slate-700 p-2 rounded-md mt-5 hover:bg-slate-900 hover:text-white">Register A New Customer</h1>
    </a>
</div>

<form action="{{ url('/sellorder') }}" method="post" class="m-5" id="orderForm">
    @csrf 
    <div class="text-left flex flex-wrap">
        <div class="mb-4 pr-4">
            <label for="date" class="block mb-2">Date</label>
            <input type="date" id="date" name="date" class="w-full px-4 py-2 border rounded-md text-black">
        </div>
        <div class="mb-4 pr-4">
            <label for="productid" class="block mb-2">Product ID</label>
            <input type="text" id="productid" name="productid" class="w-full px-4 py-2 border rounded-md text-black">
        </div>
        <div class="mb-4 pr-4">
            <label for="productname" class="block mb-2">Product Name</label>
            <input type="text" id="productname" name="productname" class="w-full px-4 py-2 border rounded-md text-black">
        </div>
        <div class="mb-4 pr-4">
            <label for="buy_price" class="block mb-2">Buy Price(Unit)</label>
            <input type="number" id="buy_price" name="buy_price" class="w-full px-4 py-2 border rounded-md text-black" oninput="calculateTotal()" required>
        </div>
        <div class="mb-4 pr-4">
            <label for="sell_price" class="block mb-2">Sell Price(Unit)</label>
            <input type="number" id="sell_price" name="sell_price" class="w-full px-4 py-2 border rounded-md text-black" oninput="calculateTotal()" required>
        </div>
        <div class="mb-4 pr-4">
            <label for="quantity" class="block mb-2">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="w-full px-4 py-2 border rounded-md text-black" oninput="calculateTotal()">
        </div>
        <div class="mb-4 pr-4">
            <label for="total_pl" class="block mb-2">Total Profit/Loss</label>
            <input type="text" id="total_pl" name="total_pl" class="w-full px-4 py-2 border rounded-md text-black" readonly>
        </div>
        <div class="mb-4">
            <label for="total_sales" class="block mb-2">Total Sales</label>
            <input type="text" id="total_sales" name="total_sales" class="w-full px-4 py-2 border rounded-md text-black" readonly>
        </div>
    </div>

    <input type="hidden" name="customer_id" value="{{ $data->id }}">
    <input type="hidden" name="customer_name" value="{{ $name }}">

    <button type="submit" onclick="confirmOrder()">Sell</button>
    
</form>


<script>
    function calculateTotal() {
        var buyPrice = parseFloat(document.getElementById('buy_price').value) || 0;
        var sellPrice = parseFloat(document.getElementById('sell_price').value) || 0;
        var quantity = parseFloat(document.getElementById('quantity').value) || 0;

        var totalPl = (sellPrice - buyPrice) * quantity;
        var total_sales = sellPrice * quantity;

        document.getElementById('total_pl').value = totalPl.toFixed(2);
        document.getElementById('total_sales').value = total_sales.toFixed(2);
    }

    function confirmOrder() {
        calculateTotal();

        var totalAmount = document.getElementById('total_sales').value;
        var totalPl = document.getElementById('total_pl').value;

        if (totalAmount !== '') {
            var confirmation = confirm('Total Amount: $' + totalAmount + '\nTotal Profit/Loss: $' + totalPl + '\n\nDo you want to proceed and place the order?');
            if (confirmation) {
                document.getElementById('orderForm').submit(); // Submit the form
            }
        } else {
            alert('Please enter valid buy price, sell price, and quantity before confirming.');
        }
    }
</script>





    
</div>
</div>
</div>
</div>


</body>
</html>