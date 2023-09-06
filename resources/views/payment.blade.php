<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Penceresi</title>
    <link rel="stylesheet" href="{{asset('assets/payment.css')}}">
</head>
<body>
<div class="payment-container">
    <form id="payment-form" method="post" action="{{route('process.payment')}}">
        @csrf
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <input type="hidden" name="service_id" value="{{$service_id}}">
        <div class="form-group">
            <input type="text" id="card-number" name="card-number" placeholder="card number">
        </div>
        <div class="form-group">
            <input type="text" id="expiry-date" name="expiry-date" placeholder="mm/yyyy">
        </div>
        <div class="form-group">
            <input type="text" id="cvv" name="cvv" placeholder="cvv">
        </div>
        <div class="form-group">
            <input type="text" id="card-holder" name="card-holder" placeholder="card name">
        </div>
        <button type="submit">Payment</button>
    </form>
</div>
</body>
</html>
