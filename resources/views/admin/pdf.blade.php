<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>This is the product details of your purchase</h1>

<h3><img src="images/products/{{$orders->product_image }}" height="200px" width="200px" alt=""></h3>

Customer Name: <h3>{{ $orders->customer_name }}</h3>
Customer Email: <h3>{{ $orders->customer_email }}</h3>
Customer Address: <h3>{{ $orders->customer_address }}</h3>
Customer Phone: <h3>{{ $orders->customer_phone }}</h3>
Product Name: <h3>{{ $orders->product_title }}</h3>
Price: <h3>{{ $orders->price  }}</h3>
Quantity: <h3>{{ $orders->quantity }}</h3>
Payment Status: <h3>{{ $orders->payment_status }}</h3>
Delivery Status: <h3>{{ $orders->delivery_status }}</h3>
</body>
</html>
