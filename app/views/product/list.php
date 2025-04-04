<?php include 'app/views/shares/header.php'; ?>
<h1>Danh sách sản phẩm</h1>

<div class="container main-container">
        <div class="welcome-card">
            <h1>Chào mừng đến với hệ thống quản lý sản phẩm</h1>
            <p>Quản lý sản phẩm của bạn một cách dễ dàng và hiệu quả với giao diện trực quan và các công cụ mạnh mẽ.</p>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-boxes"></i>
                    <h3>125</h3>
                    <p>Sản phẩm hiện có</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-tags"></i>
                    <h3>15</h3>
                    <p>Danh mục sản phẩm</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>32%</h3>
                    <p>Tăng trưởng tháng này</p>
                </div>
            </div>
        </div>
        
        <h2 class="mt-5 mb-4">Thao tác nhanh</h2>
        <div class="quick-actions">
            <button class="quick-action-btn" onclick="location.href='/Product/add'">
                <i class="fas fa-plus"></i>
                <span>Thêm sản phẩm</span>
            </button>
            <button class="quick-action-btn" onclick="location.href='/Product/'">
                <i class="fas fa-list"></i>
                <span>Xem danh sách</span>
            </button>
            <button class="quick-action-btn">
                <i class="fas fa-file-export"></i>
                <span>Xuất báo cáo</span>
            </button>
            <button class="quick-action-btn">
                <i class="fas fa-cog"></i>
                <span>Cài đặt</span>
            </button>
        </div>
    </div>

<div class="product-grid" id="product-grid">
    <!-- Danh sách sản phẩm sẽ được tải từ API và hiển thị tại đây -->
</div>

<style>
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .product-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .product-item:hover {
        transform: scale(1.05);
    }

    .product-image-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        background-color: #f0f0f0;
    }

    .product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .product-details {
        padding: 15px;
    }

    .product-details h2 {
        font-size: 1.2rem;
        margin: 0 0 10px;
    }

    .product-details p {
        margin: 5px 0;
    }

    .product-details a,
    .product-details button {
        margin-top: 10px;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem('jwtToken');
        if (!token) {
            alert('Vui lòng đăng nhập');
            location.href = '/account/login'; // Điều hướng đến trang đăng nhập
            return;
        }

        fetch('http://127.0.0.1:8080/api/product', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            }
        })
            .then(response => response.json())
            .then(data => {
                const productGrid = document.getElementById('product-grid');
                data.forEach(product => {
                    const productItem = document.createElement('div');
                    productItem.className = 'product-item';
                    productItem.innerHTML = `
                        <div class="product-image-wrapper">
                            <img src="/${product.image}" alt="Product Image" class="product-image">
                        </div>
                        <div class="product-details">
                            <h2><a href="/Product/show/${product.id}">${product.name}</a></h2>
                            <p>${product.description}</p>
                            <p>Giá: ${product.price} VND</p>
                            <p>Danh mục: ${product.category_name}</p>

                            <a href="/Product/edit/${product.id}" class="btn btn-warning">Sửa</a>
                            <button class="btn btn-danger" onclick="deleteProduct(${product.id})">Xóa</button>
                        </div>
                    `;
                    productGrid.appendChild(productItem);
                });
            });
    });

    function deleteProduct(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
            fetch(`/api/product/${id}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if (data.message === 'Product deleted successfully') {
                        location.reload();
                    } else {
                        alert('Xóa sản phẩm thất bại');
                    }
                });
        }
    }
</script>
