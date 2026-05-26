<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <p>{{$data['body']}}</p>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    @if(!empty($data['cart']))
        <h4>Chi tiết đơn hàng:</h4>
        <hr>
        @foreach($data['cart'] as $item)
            <p>
                <strong>Tên sản phẩm:</strong> {{ $item['name'] }} <br>
                <strong>Số lượng:</strong> {{ $item['quantity'] }} <br>
                <strong>Đơn giá:</strong> ${{ number_format($item['price']) }} <br>
                <strong>Thành tiền:</strong> ${{ number_format($item['price'] * $item['quantity']) }}
            </p>
        @endforeach
        <h4>Tổng cộng: ${{ number_format($data['total']) }}</h4>
        <hr>
    @endif
</body>
</html>