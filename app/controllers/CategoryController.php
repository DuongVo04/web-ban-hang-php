<?php
// Require SessionHelper and other necessary files
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');
class CategoryController
{
    private $categoryModel;
    private $db;
    private $table_name = "category";

    public function __construct()
    {
        if (!$this->isAdmin()) {
            $this->showError("Bạn không có quyền truy cập chức năng này!");
            exit;
        }   
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    private function isAdmin()
    {
        return SessionHelper::isAdmin();
    }

    // Hiển thị danh sách danh mục
    public function index()
    {
        
        $categories = $this->categoryModel->getAllCategory();
        include 'app/views/category/list.php';
    }

    // Hiển thị form thêm mới
    public function create()
    {
        include 'app/views/category/create.php';
    }

    // Thực hiện thêm danh mục
    public function store()
    {
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->categoryModel->createCategory($name, $description);
            header('Location: /Category'); // Chuyển hướng về danh sách

        }
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        include 'app/views/category/edit.php';
    }

    // Thực hiện cập nhật danh mục
    public function update($id)
    {
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
    
            $isUpdated = $this->categoryModel->updateCategory($id, $name, $description);
            if ($isUpdated) {
                header('Location: /Category'); // Chuyển hướng về danh sách
                exit;
            } else {
                // Xử lý khi cập nhật không thành công
                echo "Cập nhật không thành công.";
            }
        }
    }
    // Thực hiện xóa danh mục
    public function delete($id)
    {
        $this->categoryModel->deleteCategory($id);
        header('Location: /Category'); // Chuyển hướng về danh sách
    }

    private function showError($message) {
        $html = '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                .error-box {
                    max-width: 400px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff3f3;
                    border: 1px solid #ffcccc;
                    border-radius: 5px;
                    text-align: center;
                    font-family: Arial, sans-serif;
                }
                .error-text {
                    color: #cc0000;
                    font-size: 16px;
                }
            </style>
        </head>
        <body>
            <div class="error-box">
                <p class="error-text">'.$message.'</p>
            </div>
        </body>
        </html>';
        echo $html;
        exit;
    }
}
