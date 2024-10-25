<?php
class AdProductTypeModel extends DB{
    public function showProductType() {
        $sql = "SELECT * FROM adproducttype";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $productype = $stm->fetchAll();
        return $productype;
    }
    
    public function deleteProducttype($Ma_loaisp){
        $sql ="DELETE FROM adproducttype WHERE Ma_loaisp='$Ma_loaisp'";
        $stm=$this->Connect()->prepare($sql);
        $stm->execute();
        header("location: ..");
    }
    public function insertProductType($Ma_loaisp,$Ten_loaisp,$Mota_loaisp){
        $sql="INSERT INTO adproducttype(Ma_loaisp,Ten_loaisp,Mota_loaisp)";
        $sql.="VALUE('$Ma_loaisp','$Ten_loaisp','$Mota_loaisp')";
        try{
            $this->Connect()->exec($sql);
        }
        catch(PDOException $e){
            echo "bạn lưu không thành công".$e->getMessage();
        }
    }

    public function update($Ma_loaisp, $Ten_loaisp, $Mota_loaisp) {
        $sql = "UPDATE adproducttype SET Ten_loaisp = :Ten_loaisp, Mota_loaisp = :Mota_loaisp WHERE Ma_loaisp = :Ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
    
   
        $stm->bindParam(':Ma_loaisp', $Ma_loaisp, PDO::PARAM_INT);  
        $stm->bindParam(':Ten_loaisp', $Ten_loaisp, PDO::PARAM_STR); 
        $stm->bindParam(':Mota_loaisp', $Mota_loaisp, PDO::PARAM_STR); 
    
 
        $stm->execute();
    }
    
    public function getProductById($Ma_loaisp) {
        $sql = "SELECT * FROM adproducttype WHERE Ma_loaisp = :Ma_loaisp";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':Ma_loaisp', $Ma_loaisp, PDO::PARAM_INT);   // Kiểu số nguyên
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
}   