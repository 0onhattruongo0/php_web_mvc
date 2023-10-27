<?php
class Products extends Controller{
    public $data,$model_products;
    public function __construct()
    {
        $this->model_products = $this->model('ProductsModel');
    }
    public function index(){
        // $data['sub_content']['users'] = $this->model_user->all();
        // $data['content'] = 'admin/users/index'; 
        // $this->render('admin/layout_master',$data);
    }
}