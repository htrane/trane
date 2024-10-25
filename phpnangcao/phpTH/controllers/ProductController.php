<?php
// Yêu cầu tệp ProductModel để sử dụng
require_once 'models/ProductModel.php';

class ProductController {
    private $productModel;

    // Constructor để khởi tạo đối tượng ProductModel
    public function __construct() {
        $this->productModel = new ProductModel();
    }

    // Hiển thị danh sách sản phẩm
    public function list() {
        // Lấy tất cả sản phẩm từ model
        $products = $this->productModel->getAllProducts();
        
        // Gửi danh sách sản phẩm tới view để hiển thị
        require 'views/product_list.php';
    }

    // Hiển thị chi tiết của một sản phẩm
    public function detail($masp) {
        // Lấy thông tin chi tiết sản phẩm dựa trên mã sản phẩm (masp)
        $product = $this->productModel->getProductById($masp);
        
        // Gửi thông tin sản phẩm tới view để hiển thị
        require 'views/product_detail.php';
    }

    // Tìm kiếm sản phẩm theo từ khóa
    public function search() {
        // Kiểm tra từ khóa từ POST request
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

        // Tìm kiếm sản phẩm dựa trên từ khóa trong model
        $searchResults = $this->productModel->searchProducts($keyword);
        
        // Gửi kết quả tìm kiếm tới view để hiển thị
        require 'views/product_list.php';
    }
}
?>
