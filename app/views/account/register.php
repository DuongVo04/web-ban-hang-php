<?php include 'app/views/shares/header.php'; ?>
<?php
if (isset($errors)) {
    echo "<div class='error-container'>";
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
    echo "</div>";
}
?>

<style>
    /* Container chính */
    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 20px;
    }

    /* Card */
    .card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
        overflow: hidden;
    }

    /* Card Header */
    .card-header {
        background: #bbb;
        color: #ffffff;
        text-align: center;
        padding: 20px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    /* Card Body */
    .card-body {
        padding: 30px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 20px;
    }

    /* Label */
    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }

    /* Input */
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        outline: none;
    }

    .form-control::placeholder {
        color: #bbb;
        font-style: italic;
    }

    /* Button */
    .btn-primary {
        width: 100%;
        padding: 12px;
        background: darkseagreen;
        border: none;
        border-radius: 8px;
        color: #ffffff;
        font-size: 16px;
        font-weight: 500;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #0056b3;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    /* Error Messages */
    .error-container {
        max-width: 450px;
        margin: 20px auto;
        padding: 15px;
        background: #ffe6e6;
        border-radius: 8px;
        border: 1px solid #ffcccc;
    }

    .text-danger {
        color: #dc3545;
        font-size: 14px;
        margin: 5px 0;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .card {
            margin: 10px;
        }
        .card-body {
            padding: 20px;
        }
    }
</style>

<div class="register-container">
    <div class="card">
        <div class="card-header">
            <h2>Đăng Ký</h2>
        </div>
        <div class="card-body">
            <form class="user" action="/account/save" method="post">
                <div class="form-group">
                    <label for="username">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>