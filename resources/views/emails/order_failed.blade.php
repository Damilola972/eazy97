<!DOCTYPE html>
<html>
<head>
    <title>Order Failed</title>
</head>
<body>
    <h2>Hello,</h2>
    <p>Unfortunately, your order for <strong>{{ $details['product']->name }}</strong> could not be completed.</p>

    <p><strong>Reason:</strong> {{ $details['reason'] }}</p>

    <p>Please try again or contact support.</p>
    <br>
    <p>Thank you.</p>
</body>
</html>