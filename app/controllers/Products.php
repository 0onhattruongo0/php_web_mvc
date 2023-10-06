<?php
 class Products extends Controller{

    public $products;
    public $data= [];
    public function __construct()
    {
        $this->products = $this->model('ProductsModel');
    }

    public function index(){
    //    var_dump($this->products->getList());
        $dataProduct = $this->products->getList();
        $this->data['sub_content']['product_list'] = $dataProduct;
        $this->data['content'] = 'products/list';
        $this->render('layouts/client_layout',$this->data);
    }
    public function detail($id){
        $this->data['sub_content']['info'] = $this->products->getDetail($id);
        $this->data['content'] = 'products/detail';
        $this->render('layouts/client_layout',$this->data);
    }
 }