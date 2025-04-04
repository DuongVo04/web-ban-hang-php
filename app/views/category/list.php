<?php include 'app/views/shares/header.php'; ?>



<link rel="stylesheet" href="\public\css\category-style.css">

<div class="container">
    <div class="header-section">
        <h1>Danh sách danh mục</h1>
        <a href="/Category/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm mới danh mục
        </a>
    </div>
    
    <div class="table-wrapper">
        <table class="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['description']; ?></td>
                        <td class="action-buttons">
                            <a href="/category/edit/<?php echo $category['id']; ?>" 
                               class="btn btn-edit" 
                               title="Chỉnh sửa">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="/category/delete/<?php echo $category['id']; ?>" 
                               class="btn btn-delete" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa?')" 
                               title="Xóa">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
