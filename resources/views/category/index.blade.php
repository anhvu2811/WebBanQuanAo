@extends('layouts/layoutmaster')
@section('title', 'Danh sách loại sản phẩm')
@section('content')
    <h2 style="text-align: center; padding: 20px;">Danh sách loại sản phẩm</h2>
    <button><a href="/category/create">Add</a></button>

    <form method="GET" action="{{ route('category.index') }}">
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
                <th>Name</th>
                <th>Description</th>
                <th>Created at</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhsachloai as $ds)
                <tr>
                    <td>{{ $ds->name }}</td>
                    <td>{{ $ds->description }}</td>
                    <td>{{ $ds->created_at->format('d/m/Y H:i:s') }}</td>
                    <td><a href="{{ route('category.edit', ['id' => $ds->id]) }}">Update</a></td>
                    <td>
                        <form action="{{ route('category.destroy', ['id' => $ds->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Liên kết phân trang -->
    <div style="text-align: center;">
        {{ $danhsachloai->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
@endsection
