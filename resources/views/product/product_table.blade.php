<?php 
    use Carbon\Carbon;
?>
<style>
    /* Lớp overlay nền tối */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Nền tối với độ trong suốt */
        z-index: 999; /* Đảm bảo lớp này nằm dưới popup */
        display: none; /* Mặc định ẩn */
    }

    /* Style cho popup */
    .popup {
        position: fixed;
        top: 20%;
        left: 50%;
        transform: translate(-50%, -50%); /* Căn giữa */
        width: 50%; /* Đặt chiều rộng của popup */
        max-width: 900px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        z-index: 1000; /* Đảm bảo popup ở trên overlay */
        display: none; /* Mặc định ẩn */
    }

    /* Style cho phần popup content */
    .popup-content {
        position: relative;
    }

    /* Nút đóng (×) */
    #close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Đảm bảo popup hiển thị khi cần */
    .popup.show {
        display: block; /* Hiển thị popup khi thêm class "show" */
    }

    /* Đảm bảo overlay hiển thị khi cần */
    .popup-overlay.show {
        display: block; /* Hiển thị overlay khi thêm class "show" */
    }

    .title {
        text-align: center;
    }


</style>
<table class="table table-striped table-bordered" style="text-align:center;">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Material</th>
            <th>Price</th>
            <th>Category</th>
            <th>Created at</th>
            <th colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if($products->isEmpty())
            <tr>
                <td colspan="9">No products found</td>
            </tr>
        @endif

        @foreach($products as $index => $product) 
            <tr>
                <td>
                    {{ $products->firstItem() + $index }}
                </td>
                <td style="width: 200px;">
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $product->images->first()->image_url) }}" alt="Ảnh sản phẩm" style="max-width: 100%; max-height: 100px; object-fit: contain;">
                    @else
                        null
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->material }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ Carbon::parse($product->created_at)->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a href="javascript:void(0);" class="show-sizes" data-product-id="{{ $product->id }}">Show list sizes</a>
                </td>
                <td>
                    <a href="{{ route('product.edit', ['id' => $product->id]) }}">Update</a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="popup-overlay" class="popup-overlay"></div>

<div id="popup" class="popup" style="display: none;">
    <div class="popup-content">
        <span id="close-popup" style="cursor: pointer;">&times;</span>
        <h3 class="title">List sizes</h3>
        <table class="table table-striped table-bordered" style="text-align:center;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Size</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id="size-list">
                <!-- Sizes will be populated via AJAX -->
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const showSizesButtons = document.querySelectorAll('.show-sizes');

        showSizesButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');

                // Xóa danh sách kích thước cũ trong popup
                document.getElementById('size-list').innerHTML = '';

                // Gửi yêu cầu AJAX để lấy danh sách kích thước của sản phẩm
                fetch(`/product/${productId}/sizes`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to fetch sizes. HTTP Status: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.sizes && data.sizes.length > 0) {
                            let sizeList = document.getElementById('size-list');
                            data.sizes.forEach((size, index) => {
                                const row = `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td><b>${size.size_name}</b></td>
                                        <td>${size.stock_quantity}</td>
                                    </tr>
                                `;
                                sizeList.innerHTML += row;
                            });
                        } else {
                            document.getElementById('size-list').innerHTML = '<tr><td colspan="4">No sizes found.</td></tr>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('size-list').innerHTML = `<tr><td colspan="4">${error.message}</td></tr>`;
                    });

                // Hiển thị popup
                document.getElementById('popup').style.display = 'block';
                document.getElementById('popup-overlay').classList.add('show');
            });
        });

         // Đóng popup khi nhấn vào nút đóng
        document.getElementById('close-popup').addEventListener('click', function () {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').classList.remove('show');
        });

        // Đóng popup khi nhấn vào overlay
        document.getElementById('popup-overlay').addEventListener('click', function () {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').classList.remove('show');
        });
    });

</script>
