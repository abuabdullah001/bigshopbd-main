<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your order has been {{ $order->status }}</title>
</head>
<body>
    <p>Hello, {{ $order->order->name }}!</p>
    <p>Your order has been successfully <span>{{ $order->status }}.</span></p>

    <p>Thank you!</p>
</body>
</html>