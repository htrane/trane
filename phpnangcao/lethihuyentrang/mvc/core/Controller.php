<?php
class Controller {
    public function model($model){
       require_once "./mvc/models/".$model.".php";
       return new $model;
    }
    public function view($views,$data=array()){
        require_once "./mvc/views/".$views.".php";
    }

}
//view("adminView",["page"=>"AdProductType",cga])