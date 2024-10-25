<?php
require_once 'config/database.php';

class ProductModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        $query = "SELECT * FROM ad_product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết sản phẩm theo mã sản phẩm
    public function getProductById($masp) {
        $query = "SELECT * FROM ad_product WHERE masp = :masp";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':masp', $masp);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tìm kiếm sản phẩm theo tên
    public function searchProducts($keyword) {
        $query = "SELECT * FROM ad_product WHERE tensp LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
