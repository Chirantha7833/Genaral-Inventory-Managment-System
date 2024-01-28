<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
<div class="container-fluid page-body-wrapper">
@include('admin.navbar')
<div class="main-panel">
<div class="mx-auto p-2 text-center">
    <h1 class="font-bold text-[40px] m-2">Buy From <h1>Supplier ID: {{ $data->id }}</h1><h1>Supplier Name: {{ $name }}</h1></h1>
    <a href="/suppliers" class=" hover:no-underline">
        <h1 class=" bg-slate-700 p-2 rounded-md mt-5 hover:bg-slate-900 hover:text-white">Register A New Supplier</h1>
    </a>
</div>

<form action="{{ url('/buyorder') }}" method="post" class="m-5" id="orderForm">
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
            <label for="quantity" class="block mb-2">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="w-full px-4 py-2 border rounded-md text-black" oninput="calculateTotal()">
        </div>
        <div class="mb-4 pr-4">
            <label for="quantity_price" class="block mb-2">Quantity Price</label>
            <input type="number" id="quantity_price" name="quantity_price" class="w-full px-4 py-2 border rounded-md text-black" oninput="calculateTotal()" required>
        </div>
        <div class="mb-4">
            <label for="total_sales" class="block mb-2">Total Sales</label>
            <input type="text" id="total_sales" name="total_sales" class="w-full px-4 py-2 border rounded-md text-black" readonly>
        </div>
    </div>

    <input type="hidden" name="supplier_id" value="{{ $data->id }}">
    <input type="hidden" name="supplier_name" value="{{ $name }}">

    <button type="submit" onclick="confirmOrder()">Add to Cart</button>
    
</form>


<script>
    function calculateTotal() {
        var quantity = parseFloat(document.getElementById('quantity').value) || 0;
        var quantityPrice = parseFloat(document.getElementById('quantity_price').value) || 0;
        var total_sales = quantity * quantityPrice;

        document.getElementById('total_sales').value = total_sales.toFixed(2);
        document.getElementById('quantity_price').value = quantityPrice.toFixed(2);
    }

    function confirmOrder() {
        calculateTotal();

        var totalAmount = document.getElementById('total_sales').value;
        if (totalAmount !== '') {
            var confirmation = confirm('Total Amount: $' + totalAmount + '\n\nDo you want to proceed and place the order?');
            if (confirmation) {
                document.getElementById('orderForm').submit(); // Submit the form
            }
        } else {
            alert('Please enter valid quantity and quantity price before confirming.');
        }
    }
</script>




    
</div>
</div>
</div>
</div>


</body>
</html>