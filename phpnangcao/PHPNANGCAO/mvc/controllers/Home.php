<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function SayHi() {
        $teo = $this->model("AdProductTypeModel");
        $productTypes = $teo->showAdProductType(); // Lấy dữ liệu từ cơ sở dữ liệu
        $this->view("AdProductTypeView", ["Adproducttype" => $productTypes]); // Truyền mảng dữ liệu vào view
    }

    public function getShow(): void{
        $this->view("AdminView", ["page"=>"Admin"]);
    }
}
?>