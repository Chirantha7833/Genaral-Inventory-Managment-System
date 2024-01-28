<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="m-5">
<h1>products</h1>
<body>
<h1>Products with Supplier ID</h1>

@if($data->isEmpty())
    <p>No products found with a supplier ID.</p>
@else
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->product_id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <!-- Add more cells for additional columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</body>
</body>
</html>