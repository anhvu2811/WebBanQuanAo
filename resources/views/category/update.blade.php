<h1>Update Category</h1>
<form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Tên loại:</label><br>
    <input type="text" id="name" name="name" placeholder="Enter category name" value="<?= $category->name ?>" required><br><br>

    <label for="price">Mô tả:</label><br>
    <input type="text" id="price" name="description" placeholder="Enter description" value="<?= $category->description ?>" required><br><br>

    <button type="submit">Update Category</button>
</form>
