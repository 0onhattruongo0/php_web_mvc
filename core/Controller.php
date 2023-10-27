<?php

class Controller{

    public $db;
    public function model($model){
        if(file_exists(_DIR_ROOT.'/app/models/'.$model.'.php')){
            require_once _DIR_ROOT.'/app/models/'.$model.'.php';
            if(class_exists($model)){
                $model = new $model();
            }
            return $model;
        }
        
        return false;
    }

    public function render($view,$data=[]){
        if(!empty(View::$dataShare)){
            $data = array_merge($data, View::$dataShare);
            // print_r($data);
            extract($data); //  key thành biến
        }
      
       
        if(file_exists(_DIR_ROOT.'/app/views/'.$view.'.php')){
            require_once _DIR_ROOT.'/app/views/'.$view.'.php';
        }
    }

}