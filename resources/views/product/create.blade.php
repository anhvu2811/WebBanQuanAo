<h1>Create New Product</h1>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter category name" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" placeholder="Enter description" required><br><br>

        <label for="material">Material:</label><br>
        <input type="text" id="material" name="material" placeholder="Enter material" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" placeholder="Enter price" required><br><br>

        <label for="category_name">Category name:</label><br>
        <select name="category_id">
            @foreach($category as $category)
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            @endforeach
        </select><br><br>

        <hr>
        <p>Size</p>
        <div id="size-container">
            <div class="size-form" style="margin-bottom: 15px;">
                <label for="size_name">Size:</label>
                <input type="text" name="sizes[0][size_name]" placeholder="Enter size (e.g., S, M, L)" required>
        
                <label for="stock_quantity">Stock Quantity:</label>
                <input type="number" name="sizes[0][stock_quantity]" placeholder="Enter stock quantity" min="0" required>
        
                <button type="button" class="remove-size" style="color: red;">Remove</button>
            </div>
        </div>
        <button type="button" id="add-size">Add Size</button><br><br>

        <hr>
        <p>Image</p>
        <div id="image-container">
            <div class="image-form" style="margin-bottom: 11px;">
                <label for="image_1">Image 1:</label>
                <input type="file" name="images[0][file]" accept="image/jpeg, image/jpg, image/png" required>
        
                <label>
                    <input type="radio" name="main_image" value="0" required> Set as Main Image
                </label>
        
                <button type="button" class="remove-image" style="color: red;">Remove</button>
            </div>
        </div>
        <button type="button" id="add-image" style="margin-top: 10px;">Add Image</button><br><br>

        <button type="submit">Create Product</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sizeContainer = document.getElementById('size-container'); 
            const addSizeButton = document.getElementById('add-size');
            let sizeIndex = 1; 

            addSizeButton.addEventListener('click', function () {
                const newSizeForm = document.createElement('div');
                newSizeForm.classList.add('size-form');
                newSizeForm.style.marginBottom = "15px"; 

                newSizeForm.innerHTML = `
                    <label for="size_name">Size:</label>
                    <input 
                        type="text" 
                        name="sizes[${sizeIndex}][size_name]" 
                        placeholder="Enter size (e.g., S, M, L)" 
                        required 
                        style="margin-right: 10px;">

                    <label for="stock_quantity">Stock Quantity:</label>
                    <input 
                        type="number" 
                        name="sizes[${sizeIndex}][stock_quantity]" 
                        placeholder="Enter stock quantity" 
                        min="0" 
                        required 
                        style="margin-right: 10px;">

                    <button 
                        type="button" 
                        class="remove-size" 
                        style="color: red; border: none; background: none; cursor: pointer;">Remove</button>
                `;

                sizeContainer.appendChild(newSizeForm);
                sizeIndex++;
            });

            sizeContainer.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-size')) {
                    e.target.parentElement.remove();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const imageContainer = document.getElementById('image-container');
            const addImageButton = document.getElementById('add-image');
            let imageIndex = 1;

            addImageButton.addEventListener('click', function () {
                const newImageForm = document.createElement('div');
                newImageForm.classList.add('image-form');
                newImageForm.style.marginBottom = "10px";

                newImageForm.innerHTML = `
                    <label for="image_${imageIndex}">Image ${imageIndex + 1}:</label>
                    <input type="file" name="images[${imageIndex}][file]" accept="image/jpeg, image/jpg, image/png" required>

                    <label>
                        <input type="radio" name="main_image" value="${imageIndex}" required>
                        Set as Main Image
                    </label>

                    <button type="button" class="remove-image" style="color: red;">Remove</button>
                `;

                imageContainer.appendChild(newImageForm);
                imageIndex++;
            });

            imageContainer.addEventListener('click', function (e) {
                if (e.target && e.target.classList.contains('remove-image')) {
                    e.target.parentElement.remove();
                }
            });
        });
    </script>
