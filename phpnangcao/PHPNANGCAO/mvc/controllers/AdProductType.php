<?php
class AdProductType extends Controller {

    public function getShow() {
        $adProductTypeModel = $this->model("AdProductTypeModel");
        $data["Adproducttype"] = $adProductTypeModel->showAdProductType();
        $this->view("AdProductTypeView", $data);
    }

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maloaisp = $_POST['txt_maloaisp'];
            $name = $_POST['txt_tenloaisp'];
            $description = $_POST['txt_motaloaisp'];
    
            $adProductTypeModel = $this->model("AdProductTypeModel");
    
            try {
                $adProductTypeModel->addAdProductType($maloaisp, $name, $description);
                header("Location: " . BASE_URL . "AdProductType/getShow");
            } catch (Exception $e) {
                // Lưu thông báo lỗi vào biến để hiển thị trên giao diện
                $data['error'] = $e->getMessage();
                $this->view("AdProductTypeView", $data);
            }
        } else {
            $this->view("AdProductTypeView");
        }
    }
    

    public function edit($id) {
        $adProductTypeModel = $this->model("AdProductTypeModel");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['txt_tenloaisp'];
            $description = $_POST['txt_motaloaisp'];
            $adProductTypeModel->updateAdProductType($id, $name, $description);
            header("Location: " . BASE_URL . "AdProductType/getShow");
        } else {
            $data["Adproducttype"] = $adProductTypeModel->getAdProductTypeById($id);
            $this->view("Edit_AdProductType", $data);
        }
    }

    public function delete($id) {
        $adProductTypeModel = $this->model("AdProductTypeModel");
        $adProductTypeModel->deleteAdProductType($id);
        header("Location: " . BASE_URL . "AdProductType/getShow");
    }
}
