<?php
class AdProductModel extends DB{
    public function showProductType() {
        $sql = "SELECT * FROM adproduct";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $productype = $stm->fetchAll();
        return $productype;
    }
    
    public function delete($ma_sp) {
        $sql = "DELETE FROM adproduct WHERE ma_sp = :ma_sp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_STR);
        $stmt->execute();
    }
    
 
    public function insert($ma_loaisp, $ma_sp, $tensp, $hinhanh, $gianhap, $giaxuat, $khuyenmai, $soluong, $motasp, $ngay_nhap) {
        if (!$this->checkMaLoaiSP($ma_loaisp)) {
            return;
        }
    
        $sql = "INSERT INTO adproduct (ma_sp, ma_loaisp, tensp, hinhanh, gianhap, giaxuat, khuyenmai, soluong, motasp, ngay_nhap)
                VALUES (:ma_sp, :ma_loaisp, :tensp, :hinhanh, :gianhap, :giaxuat, :khuyenmai, :soluong, :motasp, :ngay_nhap)";
        
        try {
            $stmt = $this->Connect()->prepare($sql);
            $stmt->bindParam(':ma_sp', $ma_sp);
            $stmt->bindParam(':ma_loaisp', $ma_loaisp);
            $stmt->bindParam(':tensp', $tensp);
            $stmt->bindParam(':hinhanh', $hinhanh);
            $stmt->bindParam(':gianhap', $gianhap);
            $stmt->bindParam(':giaxuat', $giaxuat);
            $stmt->bindParam(':khuyenmai', $khuyenmai);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':motasp', $motasp);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
        header("Location: http://localhost/phpnangcao/lethihuyentrang/AdProduct/getShow");
    }
    
    public function checkMaLoaiSP($ma_loaisp) {
        $sql = "SELECT COUNT(*) FROM adproducttype WHERE Ma_loaisp = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$ma_loaisp]);
        $result = $stmt->fetchColumn();
        return $result > 0;
    }
    
    public function showadproducttypemodel() {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $adproducttype = $stm->fetchAll(); 
        return $adproducttype; 
    }
    

    
    function update($data) {
        $sql = "UPDATE adproduct SET 
            tensp = :tensp, 
            hinhanh = :hinhanh, 
            gianhap = :gianhap, 
            giaxuat = :giaxuat, 
            khuyenmai = :khuyenmai, 
            soluong = :soluong, 
            motasp = :motasp, 
            ngay_nhap = :ngay_nhap 
            WHERE ma_loaisp = :ma_loaisp";
        try {
            $stmt = $this->Connect()->prepare($sql);
            $stmt->bindParam(':tensp', $data['tensp']);
            $stmt->bindParam(':hinhanh', $data['hinhanh']);
            $stmt->bindParam(':gianhap', $data['gianhap']);
            $stmt->bindParam(':giaxuat', $data['giaxuat']);
            $stmt->bindParam(':khuyenmai', $data['khuyenmai']);
            $stmt->bindParam(':soluong', $data['soluong']);
            $stmt->bindParam(':motasp', $data['motasp']);
            $stmt->bindParam(':ngay_nhap', $data['ngay_nhap']);
            $stmt->bindParam(':ma_loaisp', $data['ma_loaisp']);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            header("Location: /ad_product/");
        }
    }
    
    
    
    public function getProductById($ma_loaisp) {
        $sql = "SELECT * FROM adproduct WHERE ma_loaisp = :ma_loaisp";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':ma_loaisp', $ma_loaisp);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    
    
    
    
    
}
    