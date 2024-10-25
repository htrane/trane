<?php
class AdProductType extends Controller{
    public function getShow(){
       $obj= $this->model("AdProductTypeModel");
       $data=$obj->showProductType();
    //    $this->view("AdProductTypeView",$data);

       $this->view("AdminView", ["page"=>"AdProductTypeView","data"=>$data]);
    }

    public function delete($Ma_loaisp){
        $obj = $this->model("AdProductTypeModel");
        $obj->deleteProducttype($Ma_loaisp);
        header("Location:..");
    }

    public function insert(){
        $obj=$this->model("AdProductTypeModel");
        $txt_Ma_loaisp=isset($_POST["txt_Ma_loaisp"])? $_POST["txt_Ma_loaisp"]:"";
        $txt_Ten_loaisp=isset($_POST["txt_Ten_loaisp"])? $_POST["txt_Ten_loaisp"]:"";
        $txt_Mota_loaisp=isset($_POST["txt_Mota_loaisp"])? $_POST["txt_Mota_loaisp"]:"";
        $obj->insertProductType($txt_Ma_loaisp,$txt_Ten_loaisp,$txt_Mota_loaisp);
        header("Location:./adproducttype");
     }
    
    public function update($Ma_loaisp) {
        $obj = $this->model("AdProductTypeModel");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Ten_loaisp = $_POST['txt_Ten_loaisp'];
            $Mota_loaisp = $_POST['txt_Mota_loaisp'];
            $obj->update($Ma_loaisp, $Ten_loaisp, $Mota_loaisp);
            header("Location: http://localhost/phpnangcao/AdProductType/getShow");
        } else {
            $product = $obj->getProductById($Ma_loaisp);
            // print_r($product);
            $this->view("AdminView", ["page" => "editView", "product" => $product]);
        }
    }
    
    
}