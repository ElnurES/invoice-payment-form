<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/invoice.css')}}">
</head>
<body>
<div class="invoice-container">
    <form id="invoice-form" method="get" action="{{route('view.payment',['user_id'=>$user->id,'service_id'=>$service->id])}}">
        <div class="form-group">
            <label for="sender">{{$user->fio}}</label>
        </div>
        <div class="form-group">
            <label for="recipient">{{$service->title}}</label>
        </div>
        <div class="form-group">
            <label for="amount">{{$service->price}}</label>
        </div>
        <button type="submit">Pay</button>
    </form>
</div>
</body>
</html>
