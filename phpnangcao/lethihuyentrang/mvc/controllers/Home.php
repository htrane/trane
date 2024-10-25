<?php
class Home extends Controller{

    public function getShow(){

        $obj= $this->model("AdProductModel");
        $data=$obj->showProductType();

        $this->view("HomeView", ["page"=>"product","data"=>$data]);
        
    }
}