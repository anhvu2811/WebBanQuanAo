<?php
    use App\Models\Product;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0; border-radius: 8px; background-color: #fafafa; }
        h1 { color: black; }
        .order-details { margin-top: 20px; }
        .order-details th, .order-details td { padding: 10px; border-bottom: 1px solid #ddd; }
        .order-details th { text-align: left; }
        .total-price { font-size: 18px; font-weight: bold; color: green; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xác nhận đơn hàng #{{ $order->id }}</h1>

        <p>Chào <b>{{ $order->customer_name }}</b>,</p>
        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin chi tiết về đơn hàng của bạn:</p>

        <table class="order-details">
            <tr>
                <th>Mã đơn hàng</th>
                <td>#{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Ngày đặt hàng</th>
                <td>{{ $order->order_date }}</td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>Địa chỉ giao hàng:</th>
                <td>{{ $order->shipping_address }}</td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td>{{ $order->notes }}</td>
            </tr>
            <tr>
                <th>Sản phẩm</th>
                <td>
                    <ul>
                        @foreach($cart as $item)
                            <?php 
                                $product = Product::find($item['product_id']);
                            ?>
                            <li>{{ $product->name }} (Size: {{ $item['size_id'] }}) x {{ $item['quantity'] }} - {{ $item['price'] }} VNĐ</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Tổng cộng</th>
                <td class="total-price">{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
            </tr>
        </table>

        <p>Chúng tôi sẽ sớm xử lý đơn hàng và thông báo đến bạn khi có cập nhật.</p>
        <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi !</p>

        <p>Trân trọng,<br>WineHouse</p>
    </div>
</body>
</html>
