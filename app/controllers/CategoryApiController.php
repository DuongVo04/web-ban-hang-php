<?php
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryApiController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Lấy danh sách danh mục
    public function index()
    {
        header('Content-Type: application/json');

        try {
            $categories = $this->categoryModel->getCategories();
            echo json_encode([
                "status" => "success",
                "data" => $categories
            ]);
        } catch (Exception $e) {
            echo json_encode([
                "status" => "error",
                "message" => "Lỗi server!"
            ]);
            http_response_code(500);
        }
    }
}
?>
