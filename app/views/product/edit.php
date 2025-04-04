<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Sửa sản phẩm</h1>
    
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li>
                        <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
        
        <!-- Tên sản phẩm -->
        <div class="form-group mb-4">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="form-group mb-4">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>

        <!-- Giá sản phẩm -->
        <div class="form-group mb-4">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
        </div>

        <!-- Danh mục sản phẩm -->
        <div class="form-group mb-4">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Hình ảnh -->
        <div class="form-group mb-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
            <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
            <?php if ($product->image): ?>
                <div class="mt-2">
                    <img src="/<?php echo $product->image; ?>" alt="Product Image" style="max-width: 150px;">
                </div>
            <?php endif; ?>
        </div>

        <!-- Nút lưu thay đổi -->
        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Lưu thay đổi</button>
    </form>

    <a href="/Product/list" class="btn btn-secondary w-100">Quay lại danh sách sản phẩm</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
