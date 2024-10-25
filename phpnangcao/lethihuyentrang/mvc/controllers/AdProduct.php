<?php
class AdProduct extends Controller{
    public function getShow(){
       $obj= $this->model("AdProductModel");
       $data=$obj->showProductType();

       $this->view("AdminView", ["page"=>"AdProductView","data"=>$data]);
    }

    public function delete($Ma_sp) {
        $obj = $this->model("AdProductModel");
        $obj->delete($Ma_sp);
        header("Location:..");
    }

    public function insert() {
        $obj = $this->model("adproductmodel");
        $productTypes = $obj->showadproducttypemodel(); 

        
        $hinhanh = '';
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != '') {
            $file_name = $_FILES['hinhanh']['name'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
            $hinhanh = "public/images/" . $file_name;
    
            if (!move_uploaded_file($file_tmp, $hinhanh)) {
                echo "Có lỗi khi tải ảnh lên.";
                return;
            }
        }
    
        $ma_loaisp = isset($_POST['ma_loaisp']) ? $_POST['ma_loaisp'] : '';
        $ma_sp = isset($_POST['ma_sp']) ? $_POST['ma_sp'] : '';
        $tensp = isset($_POST['tensp']) ? $_POST['tensp'] : '';
        $gianhap = isset($_POST['gianhap']) ? $_POST['gianhap'] : '';
        $giaxuat = isset($_POST['giaxuat']) ? $_POST['giaxuat'] : '';
        $khuyenmai = isset($_POST['khuyenmai']) ? $_POST['khuyenmai'] : '';
        $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : '';
        $motasp = isset($_POST['motasp']) ? $_POST['motasp'] : '';
        $ngay_nhap = isset($_POST['ngay_nhap']) ? $_POST['ngay_nhap'] : '';
    
    
        $obj->insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $gianhap, $giaxuat, $khuyenmai, $soluong, $motasp, $ngay_nhap);
        $this->view("AdminView", ["page"=>"editproduct", "productTypes"=>$productTypes]);
    }
    

    public function update($ma_loaisp) {
        $obj = $this->model("AdProductModel");    
        $productTypes = $obj->showadproducttypemodel();
        $product = $obj->getProductById($ma_loaisp);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_sp = $_POST['ma_sp'] ?? '';
            $errors = [];
    
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != '') {
                $file_name = $_FILES['hinhanh']['name'];
                $file_tmp = $_FILES['hinhanh']['tmp_name'];
                $hinhanh = "public/images/" . $file_name;
    
                if (!move_uploaded_file($file_tmp, $hinhanh)) {
                    echo "Có lỗi khi tải ảnh lên.";
                    return;
                }
            } else {
                $hinhanh = $product['hinhanh']; // Sử dụng ảnh cũ nếu không upload ảnh mới
            }
    
            $tensp = $_POST['tensp'] ?? '';
            $gianhap = $_POST['gianhap'] ?? '';
            $giaxuat = $_POST['giaxuat'] ?? '';
            $khuyenmai = $_POST['khuyenmai'] ?? '';
            $soluong = $_POST['soluong'] ?? '';
            $motasp = $_POST['motasp'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
    
            $data = [
                'ma_loaisp' => $ma_loaisp,
                'ma_sp' => $ma_sp,
                'tensp' => $tensp,
                'hinhanh' => $hinhanh,
                'gianhap' => $gianhap,
                'giaxuat' => $giaxuat,
                'khuyenmai' => $khuyenmai,
                'soluong' => $soluong,
                'motasp' => $motasp,
                'ngay_nhap' => $ngay_nhap
            ];
    
            if (empty($errors)) {
                if ($obj->update($data)) {
                    // Redirect to the update product page
                    header("Location: /phpnangcao/website_mvst4/AdProduct/");
                    exit();
                } else {
                    $errors[] = "Failed to update product.";
                }
            }
        }
    
        $this->view("AdminView", ["page" => "updateproduct", "product" => $product]);
    }
    
    
    
    
    
    
    
    
    
}