<!-- resources/views/order/index.blade.php -->
<?php 
    use Carbon\Carbon;
?>
@extends('layouts/layoutmaster')
@section('title', 'Danh sách đơn hàng')
@section('content')
    <h2 style="text-align: center; padding: 20px;">Danh sách đơn hàng</h2>
    <button><a href="/order/create">Add</a></button>

    <form method="GET" action="{{ route('order.index') }}">
        <label for="perPage">Chọn số hiển thị:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="30" {{ request('perPage') == 30 ? 'selected' : '' }}>30</option>
        </select>
    </form>

    <table class="table table-striped table-bordered" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th>Order date</th>
                <th>Customer name</th>
                <th>Total price</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        <button>
                            {{ Carbon::parse($order->order_date)->format('d/m/Y') }} <br>
                            {{ Carbon::parse($order->order_date)->format('H:i:s') }}
                        </button>
                    </td>
                    
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>
                        <button>Detail</button>
                    </td>
                    <td>
                        <form action="{{ route('order.destroy', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Liên kết phân trang -->
    <div style="text-align: center;">
        {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
@endsection
