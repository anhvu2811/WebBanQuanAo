@extends('layouts/user/layoutmaster')
@section('content')
<head>
   <title> {{ $setting->site_name ?? 'NULL' }} - Giỏ Hàng </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <style>
      .box-heading {
         margin-bottom: 30px;
         margin-top: 30px;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin: 20px 0;
      }

      table th, table td {
         padding: 15px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      table th {
         background-color: #f7f7f7;
         color: #333;
      }

      table td img {
         width: 80px;
         height: 80px;
         object-fit: cover;
      }

      table td.product-name {
         font-weight: bold;
      }

      table td.price, table td.quantity, table td.total {
         text-align: center;
      }

      /* Cart summary styles */
      .cart-summary {
         background-color: #fff;
         padding: 20px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         margin-top: 30px;
         display: flex;
         justify-content: space-between;
      }

      .cart-summary .total {
         font-size: 24px;
         font-weight: bold;
         color: #333;
      }

      .cart-summary .checkout-button {
         background-color: #007bff;
         color: #fff;
         padding: 12px 20px;
         border: none;
         cursor: pointer;
         font-size: 18px;
         border-radius: 5px;
         text-align: center;
      }

      .cart-summary .checkout-button:hover {
         background-color: #0056b3;
      }

      /* Responsive design */
      @media (max-width: 768px) {
         .container {
            padding: 10px;
         }

         table th, table td {
            padding: 10px;
         }

         .cart-summary {
            flex-direction: column;
            align-items: center;
         }

         .cart-summary .total {
            margin-bottom: 15px;
         }
      }

   </style>
</head>
<div>
   <div class="container">
      <div class="box-heading">
         <h1 class="title-head page-title">Giỏ hàng</h1>
         @if(session('cart'))
            <section style="background-color: white;">
               <table>
                  <thead>
                     <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                        $total = 0;
                     @endphp
                     @foreach(session('cart') as $id => $cart)
                     <tr>
                           <td><img src="{{ asset('storage/' . $cart['image']) }}" alt="{{ $cart['name'] }}" width="100"></td>
                           <td>{{ $cart['name'] }}</td>
                           <td>{{ number_format($cart['price'], 0, ',', '.') }}₫</td>
                           <td>
                              <input type="number" value="{{ $cart['quantity'] }}" min="1" max="10" />
                           </td>
                           <td>
                              @php
                                 $itemTotal = $cart['quantity'] * $cart['price'];
                                 $total += $itemTotal;
                              @endphp
                              {{ number_format($itemTotal , 0, ',', '.') }}₫
                           </td>
                           <td>
                              <form action="{{ route('cart.remove', $id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger" style="border: none; background: none;">
                                    <i class="fa fa-times" style="font-size: 20px; color: #e8b34f; font-weight: bold;"></i>
                                </button>                                
                              </form>
                           </td>
                     </tr>
                     @endforeach
               </tbody>
               </table>
            </section>

            <div class="cart-summary">
               <div class="total" style="margin-top: 10px">Tổng tiền: <span style="color: #e8b34f">{{ number_format($total , 0, ',', '.') }}₫</span></div>
               <a href="{{ route('cart.checkout') }}">
                  <button class="checkout-button" style="background-color: #e8b34f; color: #fff; border-radius: 3px; height: 50px; line-height: 35px; padding: 0 50px; font-size: 16px;">
                      Tiến hành thanh toán
                  </button>
              </a>
            </div>
         @else
            <p>Không có sản phẩm nào trong giỏ hàng. Quay lại cửa hàng để tiếp tục mua sắm.</p>
         @endif
      </div>
   </div>
   @include('page/list_brands');
</div>
@endsection
