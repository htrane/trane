<?php
class AdProductTypeModel extends DB {
    public function showAdProductType() : array {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdProductType($maloaisp, $name, $description) {
        // Kiểm tra xem các trường có bị trống hay không
        if (empty($maloaisp) || empty($name) || empty($description)) {
            throw new Exception("Mã loại sản phẩm, tên loại sản phẩm và mô tả không được để trống.");
        }
        // Kiểm tra xem mã loại sản phẩm đã tồn tại chưa
        $sql_check = "SELECT COUNT(*) FROM adproducttype WHERE Ma_loaisp = :maloaisp";
        $stm_check = $this->con->prepare($sql_check);
        $stm_check->bindParam(':maloaisp', $maloaisp);
        $stm_check->execute();
        
        $count = $stm_check->fetchColumn();
    
        if ($count > 0) {
            // Nếu mã loại sản phẩm đã tồn tại, trả về lỗi hoặc thông báo
            throw new Exception("Mã loại sản phẩm đã tồn tại.");
        } else {
            // Nếu mã loại sản phẩm chưa tồn tại, thực hiện chèn dữ liệu
            $sql = "INSERT INTO adproducttype (Ma_loaisp , Ten_loaisp, Mota_loaisp) VALUES (:maloaisp, :name, :description)";
            $stm = $this->con->prepare($sql);
            $stm->bindParam(':maloaisp', $maloaisp); 
            $stm->bindParam(':name', $name);
            $stm->bindParam(':description', $description);
            return $stm->execute();
        }
    }
    
    

    public function deleteAdProductType($id) {
        $sql = "DELETE FROM adproducttype WHERE Ma_loaisp = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

    public function getAdProductTypeById($id) {
        $sql = "SELECT * FROM adproducttype WHERE Ma_loaisp = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAdProductType($id, $name, $description) {
        $sql = "UPDATE adproducttype SET Ten_loaisp = :name, Mota_loaisp = :description WHERE Ma_loaisp = :id";
        $stm = $this->con->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->bindParam(':description', $description);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }
}
