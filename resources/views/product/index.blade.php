@extends('layouts/layoutmaster')

@section('title', 'Danh sách sản phẩm')
@section('content')
    <h2 style="text-align: center; padding: 20px;"  >Danh sách sản phẩm</h2>
    <button><a href="/product/create">Add</a></button>

    <form method="GET" action="{{ route('product.index') }}">
        <label for="perPage">Chọn số hiển thị:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
            <option value="30" {{ request('perPage') == 30 ? 'selected' : '' }}>30</option>
        </select>

        <label for="search">Tìm kiếm tên sản phẩm:</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nhập tên sản phẩm" />
        <button type="submit">Search</button>

        <label for="sortPrice">Sắp xếp theo tiền</label>
        <select name="sortPrice" id="sortPrice" onchange="this.form.submit()">
            <option value="asc" {{ request('sortPrice') == 'asc' ? 'selected' : '' }}>Giá tăng dần</option>
            <option value="desc" {{ request('sortPrice') == 'desc' ? 'selected' : '' }}>Giá giảm dần</option>
        </select>
    </form>

    <!-- Hiển thị danh sách sản phẩm -->
    <div id="productList">
        @include('product.product_table', ['products' => $products])
    </div>

    <!-- Hiển thị phân trang -->
    <div id="pagination">
        @include('product.pagination', ['products' => $products])
    </div>
@endsection
