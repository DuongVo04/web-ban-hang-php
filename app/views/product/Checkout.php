<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Thanh toán</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="/Product/processCheckout">
                        <!-- Họ tên -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <!-- Số điện thoại -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <!-- Địa chỉ -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ:</label>
                            <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                        </div>
                        <!-- Nút thanh toán -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Thanh toán</button>
                        </div>
                    </form>
                    <!-- Nút quay lại giỏ hàng -->
                    <div class="mt-3 text-center">
                        <a href="/Product/cart" class="btn btn-outline-secondary">Quay lại giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>