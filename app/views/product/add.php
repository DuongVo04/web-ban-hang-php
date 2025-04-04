<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h1 class="p-5 text-center">Thêm sản phẩm mới</h1>



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

    <form method="POST" action="/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">

        <!-- Tên sản phẩm -->
        <div class="form-group mb-4">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="form-group mb-4">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <!-- Giá sản phẩm -->
        <div class="form-group mb-4">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <!-- Danh mục sản phẩm -->
        <div class="form-group mb-4">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Hình ảnh sản phẩm -->
        <div class="form-group mb-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <!-- Nút thêm sản phẩm -->
        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">Thêm sản phẩm</button>
    </form>

    <a href="/Product/list" class="btn btn-secondary w-100">Quay lại danh sách sản phẩm</a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem('jwtToken');
        if (!token) {
            alert('Vui lòng đăng nhập');
            location.href = '/account/login'; // Điều hướng đến trang đăng nhập
            return;
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>