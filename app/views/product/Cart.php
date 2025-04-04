<?php
// Giả sử giỏ hàng được lưu trong session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$cart = $_SESSION['cart'];

// Xử lý cập nhật số lượng sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $quantity) {
        if (isset($cart[$id])) {
            $quantity = (int) $quantity;
            if ($quantity > 0) {
                $cart[$id]['quantity'] = $quantity;
            } else {
                // Nếu số lượng bằng 0, xóa sản phẩm khỏi giỏ hàng
                unset($cart[$id]);
            }
        }
    }
    $_SESSION['cart'] = $cart;
    // Redirect để tránh việc submit lại form khi refresh trang
    header('Location: /Product/showCart' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<?php include 'app/views/shares/header.php'; ?>
<h1 class="text-center my-4">Giỏ hàng</h1>

<div class="container">
    <?php if (!empty($cart)): ?>
        <form method="POST" action="">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $total = 0; // Khởi tạo biến tổng tiền giỏ hàng
                            foreach ($cart as $id => $item):
                                // Tính tổng giá trị cho mỗi sản phẩm
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal; // Cộng vào tổng giỏ hàng
                                ?>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="d-flex align-items-center">
                                        <?php if ($item['image']): ?>
                                            <img src="/<?php echo $item['image']; ?>" alt="ProductImage" class="img-thumbnail"
                                                style="max-width: 100px; margin-right: 20px;">
                                        <?php endif; ?>
                                        <div>
                                            <h5 class="mb-0"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </h5>
                                            <p class="mb-0">Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VND
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="number" name="quantity[<?php echo $id; ?>]"
                                            value="<?php echo $item['quantity']; ?>" min="0" class="form-control"
                                            style="width: 80px;">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0">Tổng cho sản phẩm: <?php echo number_format($subtotal, 0, ',', '.'); ?> VND
                                    </p>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tổng cộng</h5>
                            <h3 class="card-text"><?php echo number_format($total, 0, ',', '.'); ?> VND</h3>
                            <button type="submit" name="update_cart" class="btn btn-primary w-100">Cập nhật giỏ
                                hàng</button>
                            <a href="/Product/checkout" class="btn btn-success w-100 mt-2">Thanh Toán</a>
                            <a href="/Product" class="btn btn-outline-secondary w-100 mt-2">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            Giỏ hàng của bạn đang trống.
        </div>
        <div class="text-center">
            <a href="/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>