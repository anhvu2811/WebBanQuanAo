<?php
    use App\Models\Order;
    $order = Order::orderBy('id', 'desc')->first();
?>
<style>
    .order-success-page {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f8f9fa;
        font-family: 'Gilroy Extra Bold', sans-serif;
    }

    .order-success-box {
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 700px;
        text-align: center;
    }

    .order-success-box h1 {
        color: #28b44c;
        font-size: 36px;
        font-weight: bold;
    }

    .order-summary {
        margin-top: 30px;
    }

    .order-summary h3 {
        color: #333;
        font-size: 24px;
    }

    .order-info {
        text-align: left;
        margin-top: 20px;
    }

    .order-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 16px;
        color: #555;
    }

    .order-item strong {
        color: #333;
    }

    .thank-you-section {
        margin-top: 40px;
    }

    .thank-you-msg {
        font-size: 20px;
        font-weight: bold;
        color: black;
    }

    .icon {
        height: 50px;
        width: 50px;
    }

    .btn {
        margin-top: 30px;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        background-color: #fff;
        color: #e8b34f;
        border: solid thin #e8b34f;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
        border-radius: 10px;
    }

    .btn:hover {
        background-color: #fff;
        color: #fff;
        border: solid thin #e8b34f;
        background-color: #e8b34f;
    }
</style>
<div class="order-success-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Box Container -->
                <div class="order-success-box">
                    <img class="icon" src="{{ asset('images/icon-order-success.png') }}"/>
                    <h1 class="text-center">Đặt Hàng Thành Công!</h1>
                    <p class="text-center">Cảm ơn bạn đã đặt hàng, bộ phận chăm sóc khách hàng của chúng tôi sẽ liên hệ với bạn trong vòng 24h để xác nhận, hãy để ý điện thoại bạn nhé!</p>

                    <div class="order-summary">
                        <h3>Thông Tin Đơn Hàng</h3>

                        <!-- Sử dụng Flexbox để căn lề trái cho các mục thông tin -->
                        <div class="order-info">
                            <div class="order-item">
                                <strong>Mã Đơn Hàng:</strong>
                                <span>#{{ $order->id }}</span>
                            </div>
                            <div class="order-item">
                                <strong>Ngày Đặt Hàng:</strong>
                                <span>{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i:s') }}</span>
                            </div>
                            <div class="order-item">
                                <strong>Tổng Tiền:</strong>
                                <span>{{ number_format($order->total_price, 0, ',', '.') }} VND</span>
                            </div>
                            <div class="order-item">
                                <strong>Địa Chỉ Giao Hàng:</strong>
                                <span>{{ $order->shipping_address }}</span>
                            </div>
                            <div class="order-item">
                                <strong>Lưu Ý:</strong>
                                <span>{{ $order->notes ?? 'Không có lưu ý thêm' }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="thank-you-section text-center">
                        <p class="thank-you-msg">Cảm ơn bạn đã mua sắm tại Winehouse!</p>
                        <a href="{{ url('/') }}" class="btn btn-primary">Quay về trang chủ</a>
                        <a href="{{ route('product.showAllProduct') }}" class="btn btn-info">Xem sản phẩm khác</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>