<?php include 'app/views/shares/header.php'; ?>


<link rel="stylesheet" href="\public\css\category-style.css">
<div class="container">
    <div class="header-section">
        <h1>Thêm mới danh mục</h1>
        <a href="/category" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
    
    <div class="form-wrapper">
        <form action="/category/store" method="POST" class="category-form">
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" id="name" name="name" required placeholder="Nhập tên danh mục">
            </div>
            
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea id="description" name="description" placeholder="Nhập mô tả (không bắt buộc)"></textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-save"></i> Lưu
                </button>
            </div>
        </form>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
