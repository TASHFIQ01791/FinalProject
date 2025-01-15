<!DOCTYPE html>
<html>
<head>
    <title>Congratulations! You are the highest bidder</title>
</head>
<body>
    <h1>Congratulations, {{ $bid->user->name }}!</h1>
    <p>You have won the bid for the following product:</p>
    <ul>
        <li>Product Name: {{ $product->name }}</li>
        <li>Bid Amount: {{ $bid->bid_amount }}</li>
    </ul>
    <p>Thank you for participating in our auction.</p>
</body>
</html>
