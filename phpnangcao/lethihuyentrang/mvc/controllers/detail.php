<?php
class detail extends Controller{

    public function getShow(){

        $obj= $this->model("AdProductModel");
        $data=$obj->showProductType();

        $this->view("HomeView", ["page"=>"detail","data"=>$data]);
        
    }
}