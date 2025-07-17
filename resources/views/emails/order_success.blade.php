<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
</head>
<body>
    <h2>Hi {{ $order->full_name }},</h2>
    <p>Your order was successful! 🎉</p>

    <p><strong>Tracking ID:</strong> {{ $order->tracking_id }}</p>
    <p><strong>Total Paid:</strong> ₦{{ number_format($order->total, 2) }} ({{ $order->currency }})</p>

    <p><strong>Items:</strong></p>
    <ul>
        @foreach (json_decode($order->items) as $item)
            <li>{{ $item->quantity }} × {{ $item->name }} @ ₦{{ number_format($item->price, 2) }}</li>
        @endforeach
    </ul>

    <p>We’ll notify you when your order is out for delivery.</p>

    <br><br>
    <p>Thank you for shopping with us.</p>
</body>
</html>