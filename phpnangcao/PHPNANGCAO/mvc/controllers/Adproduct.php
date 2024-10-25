<?php
class Adproduct extends Controller {

    public function getShow() {
        $adProductTypeModel = $this->model("AdproductModel");
        $data["Adproduct"] = $adProductTypeModel->showAdProductType();
        $this->view("AdProductView", $data);
    }

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Ma_loaisp = $_POST['txt_maloaisp']; // Lấy mã loại sản phẩm từ dropdown
            $ma_sp = $_POST['txt_masp'];
            $Ten_loaisp = $_POST['txt_tenloaisp'];
            $hinhanh = $_FILES['txt_hinhanh']['name'];
            $gianhap = $_POST['txt_gianhap'];
            $giaxuat = $_POST['txt_giaxuat'];
            $soluong = $_POST['txt_soluong'];
            $khuyenmai = $_POST['txt_khuyenmai'];
            $Mota_loaisp = $_POST['txt_motaloaisp'];
            $create_date = $_POST['txt_create_date'];
    
            // Khởi tạo biến $data để lưu trữ thông tin
            $data = [
                "Ma_loaisp" => $Ma_loaisp,
                "ma_sp" => $ma_sp,
                "Ten_loaisp" => $Ten_loaisp,
                "hinhanh" => $hinhanh,
                "gianhap" => $gianhap,
                "giaxuat" => $giaxuat,
                "soluong" => $soluong,
                "khuyenmai" => $khuyenmai,
                "Mota_loaisp" => $Mota_loaisp,
                "create_date" => $create_date,
                "error" => ""
            ];
    
            // Kiểm tra xem có trường nào bị trống không
            if (empty($Ma_loaisp) || empty($ma_sp) || empty($Ten_loaisp) || empty($hinhanh) || 
                empty($gianhap) || empty($giaxuat) || empty($soluong) || empty($khuyenmai) || 
                empty($Mota_loaisp) || empty($create_date)) {
                $data["error"] = "Các trường không được để trống.";
                $this->view("Add_ProductView", $data);
            } else {
                // Xử lý upload hình ảnh
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
    
                // Kiểm tra kiểu tệp
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $data["error"] = "Tệp không phải hình ảnh.";
                        $uploadOk = 0;
                    }
                }
    
                // Giới hạn kích thước tệp
                if ($_FILES["txt_hinhanh"]["size"] > 500000) {
                    $data["error"] = "Xin lỗi, kích thước tệp quá lớn.";
                    $uploadOk = 0;
                }
    
                // Chỉ cho phép các định dạng hình ảnh
                if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                    $data["error"] = "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }
    
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $this->view("Add_ProductView", $data);
                } else {
                    if (move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        // Nếu upload thành công, gọi mô hình để thêm sản phẩm
                        $adProductModel = $this->model("AdProductModel");
    
                        try {
                            $adProductModel->addAdProduct($Ma_loaisp, $ma_sp, $Ten_loaisp, $hinhanh, $gianhap, $giaxuat, $soluong, $khuyenmai, $Mota_loaisp, $create_date);
                            header("Location: " . BASE_URL . "AdProduct/getShow");
                            exit;
                        } catch (Exception $e) {
                            $data["error"] = $e->getMessage();
                            $this->view("Add_ProductView", $data);
                        }
                    } else {
                        $data["error"] = "Xin lỗi, đã có lỗi xảy ra khi upload tệp của bạn.";
                        $this->view("Add_ProductView", $data);
                    }
                }
            }
        } else {
            $adProductTypeModel = $this->model("AdproductModel");
            $data["allMaLoaiSanPham"] = $adProductTypeModel->getAllMaLoaiSanPham();
            
            // Nếu không phải là yêu cầu POST, hiển thị form thêm sản phẩm
            $this->view("Add_ProductView", [
                "Ma_loaisp" => "",
                "ma_sp" => "",
                "Ten_loaisp" => "",
                "hinhanh" => "",
                "gianhap" => "",
                "giaxuat" => "",
                "soluong" => "",
                "khuyenmai" => "",
                "Mota_loaisp" => "",
                "create_date" => "",
                "error" => "",
                "allMaLoaiSanPham" => $data["allMaLoaiSanPham"] // Truyền dữ liệu vào view
            ]);
        }
    }
    

    public function delete($id) {
        $adProductTypeModel = $this->model("AdproductModel");
        $adProductTypeModel->deleteAdProduct($id);
        header("Location: " . BASE_URL . "AdProduct/getShow");
    }

    
 
    public function edit($id) {
        $adProductModel = $this->model("AdproductModel");
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $ma_loaisp = trim($_POST['txt_maloaisp']);
            $tensp = trim($_POST['txt_tenloaisp']);
            $gianhap = trim($_POST['txt_gianhap']);
            $giaxuat = trim($_POST['txt_giaxuat']);
            $soluong = trim($_POST['txt_soluong']);
            $khuyenmai = trim($_POST['txt_khuyenmai']);
            $mota_sp = trim($_POST['txt_motaloaisp']);
            $create_date = trim($_POST['txt_create_date']);
    
            // Xử lý hình ảnh
            if (!empty($_FILES['txt_hinhanh']['name'])) {
                // Người dùng đã tải lên hình ảnh mới
                $hinhanh = $_FILES['txt_hinhanh']['name'];
                $target_dir = "./public/images/"; // Đường dẫn thư mục lưu trữ hình ảnh
                $target_file = $target_dir . basename($_FILES["txt_hinhanh"]["name"]);
                $uploadOk = 1;
    
                // Kiểm tra kiểu tệp
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["txt_hinhanh"]["tmp_name"]);
                if ($check === false) {
                    $data["error"] = "Tệp không phải hình ảnh.";
                    $uploadOk = 0;
                }
    
                // Giới hạn kích thước tệp
                if ($_FILES["txt_hinhanh"]["size"] > 500000) {
                    $data["error"] = "Xin lỗi, kích thước tệp quá lớn.";
                    $uploadOk = 0;
                }
    
                // Chỉ cho phép các định dạng hình ảnh
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $data["error"] = "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }
    
                // Kiểm tra nếu uploadOk là 0 do lỗi
                if ($uploadOk == 0) {
                    $data["error"] = "Có lỗi xảy ra khi tải lên hình ảnh.";
                    $this->view("Edit_AdProductView", $data);
                    return;
                } else {
                    // Di chuyển tệp hình ảnh vào thư mục đích
                    if (!move_uploaded_file($_FILES["txt_hinhanh"]["tmp_name"], $target_file)) {
                        $data["error"] = "Có lỗi xảy ra khi di chuyển tệp hình ảnh.";
                        $this->view("Edit_AdProductView", $data);
                        return;
                    }
                }
            } else {
                // Nếu không có hình ảnh mới được tải lên, giữ lại hình ảnh cũ
                $adProduct = $adProductModel->getAdProductById($id);
                $hinhanh = $adProduct['hinhanh']; // Giữ lại hình ảnh cũ
            }
    
            try {
                // Cập nhật sản phẩm
                $adProductModel->updateAdProduct($id, $ma_loaisp, $tensp, $gianhap, $giaxuat, $soluong, $khuyenmai, $mota_sp, $create_date, $hinhanh);
                // Chuyển hướng đến danh sách sản phẩm
                header("Location: " . BASE_URL . "AdProduct/getShow");
                exit(); // Dừng thực hiện script
            } catch (Exception $e) {
                // Xử lý lỗi
                $data["error"] = $e->getMessage();
                $data["Adproduct"] = $adProductModel->getAdProductById($id);
                $this->view("Edit_AdProductView", $data);
            }
        } else {
            // Nếu không phải là yêu cầu POST, lấy dữ liệu sản phẩm
            $data["Adproduct"] = $adProductModel->getAdProductById($id);
            $this->view("Edit_AdProductView", $data);
        }
    }
}
