<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<h1>Update Product</h1>
<form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter category name" value="{{ $product->name }}" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" placeholder="Enter description" value="{{ $product->description }}" required><br><br>

        <label for="material">Material:</label><br>
        <input type="text" id="material" name="material" placeholder="Enter material" value="{{ $product->material }}" required><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" placeholder="Enter price" value="{{ $product->price }}" required><br><br>

        <label for="category_name">Category name:</label><br>
        <select name="category_id">
            @foreach($category as $category)
                <option value="{{ $category->id }}" 
                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <div id="size-container">
            @foreach($productSizes as $index => $productSize) 
                <div class="size-form" id="size-container-{{$index}}" style="margin-bottom: 15px;">
                    <label>Size:</label> 
                    <input type="text" name="sizes[{{$index}}][size_name]" value="{{ $productSize->size->name }}" style="margin-right: 10px;"/>
                    <label>Stock Quantity:</label> 
                    <input type="number" name="sizes[{{$index}}][stock_quantity]" value="{{ $productSize->stock_quantity }}" style="margin-right: 10px;"/>

                    <button type="button" class="remove-size" style="color: red; border: none; background: none; cursor: pointer;">Remove</button>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-size">Add Size</button><br><br>

        <div id="image-container">
            @foreach($productImages as $index => $productImage) 
                <div id="image-container-{{ $index }}" style="display: flex; align-items: center; margin-bottom: 10px;">
                    <div style="position: relative; display: inline-block;">
                        <label for="image_{{ $index }}">Image {{ $index + 1 }}:</label><br>
                        
                        @if ($productImage->image_url)
                            <div style="position: relative; display: inline-block;">
                                <!-- Icon chỉnh sửa -->
                                <a href="javascript:void(0)" onclick="document.getElementById('image_{{ $index }}').click();" 
                                   style="position: absolute; top: 5px; right: 40px;">
                                    <i class="fa fa-pencil" style="color: white; font-size: 18px; background-color: rgba(0, 0, 0, 0.5); border-radius: 50%; padding: 5px;"></i>
                                </a>
                                <input type="file" id="image_{{ $index }}" style="display: none;" onchange="updateImage('{{ $productImage->id }}', this)">
                            
                                <!-- Nút xóa hình ảnh -->
                                <button type="button" class="delete-image-btn" data-id="{{ $productImage->id }}" style="position: absolute; top: 5px; right: 2px; color: white; font-size: 18px; background-color: rgba(255, 0, 0, 0.5); border-radius: 50%; padding: 5px; border: none; cursor: pointer;">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <img id="currentImage{{ $index }}" src="{{ asset('storage/' . $productImage->image_url) }}" alt="Ảnh sản phẩm" height="70" width="70" data-id="{{ $productImage->id }}" style="max-width: 100%; max-height: 100px; object-fit: contain;">
                            </div>
                        @else
                            <input type="file" name="images[{{ $index }}][file]" accept="image/jpeg, image/jpg, image/png"><br><br>
                        @endif
                        <input type="file" name="images[{{ $index }}][file]" accept="image/jpeg, image/jpg, image/png" id="image_{{ $index }}" style="display: none;" onchange="previewImage({{ $index }}, event)">
                    </div>
                    
                    <!-- Radio button để chọn ảnh chính, nằm bên phải -->
                    <div style="margin-left: 15px;">
                        <input type="radio" name="main_image" value="{{ $index }}" required
                            @if($productImage->is_main)
                                checked
                            @endif
                        >
                        <label for="main_image">Set as Main Image</label>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-image" style="margin-top: 10px;">Add Image</button><br><br>

        <button type="submit">Update Product</button>
</form>
<script>
    function previewImage(index, event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var imgElement = document.getElementById('currentImage' + index);
            if (imgElement) {
                imgElement.src = e.target.result; 
            }
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function removeImage(index) {
        var container = document.getElementById('image-container-' + index);
        container.parentNode.removeChild(container);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const sizeContainer = document.getElementById('size-container');
        const addSizeButton = document.getElementById('add-size');
        const addImageButton = document.getElementById('add-image');
        const imageContainer = document.getElementById('image-container');
        let sizeIndex = {{ count($productSizes) }};
        let imageIndex = {{ count($productImages) }};

        // Lắng nghe khi nhấn vào nút "Add Size"
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
                e.target.closest('.size-form').remove();
            }
        });

        addImageButton.addEventListener('click', function () {
            const newImageDiv = document.createElement('div');
            newImageDiv.id = 'image-container-' + imageIndex;
            newImageDiv.style.display = "flex";
            newImageDiv.style.alignItems = "center";
            newImageDiv.style.marginBottom = "10px";

            newImageDiv.innerHTML = `
                <div style="position: relative; display: inline-block;">
                    <label for="image_${imageIndex}">Image ${imageIndex + 1}:</label><br>
                    <input type="file" name="images[${imageIndex}][file]" accept="image/jpeg, image/jpg, image/png" id="image_${imageIndex}" onchange="previewImage(${imageIndex}, event)"><br><br>
                </div>

                <div style="margin-left: 15px;">
                    <input type="radio" name="main_image" value="${imageIndex}">
                    <label for="main_image">Set as Main Image</label>
                </div>
            `;
            imageContainer.appendChild(newImageDiv);
            imageIndex++;
        });
    });

    // Ajax delete image
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-image-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const imageId = this.getAttribute('data-id');
                const button = this;
                
                fetch(`/product/delete-image/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete image');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) { 
                        location.reload();
                    } else {
                        alert('Error deleting image: ' + (data.message || 'Unknown error'));
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the image');
                });
            });
        });
    });

    function updateImage(imageId, inputElement) {
        const file = inputElement.files[0]; 

        if (!file) {
            alert('Vui lòng chọn hình ảnh!');
            return;
        }

        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        fetch(`/product/update-image/${imageId}`, { 
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update image');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                location.reload();  
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || 'Không xác định'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra trong quá trình cập nhật hình ảnh');
        });
    }

</script>


