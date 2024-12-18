<h1>Create New Category</h1>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label for="name">Tên loại:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter category name" required><br><br>

        <label for="price">Mô tả:</label><br>
        <input type="text" id="price" name="description" placeholder="Enter description" required><br><br>

        <button type="submit">Create Category</button>
    </form>
