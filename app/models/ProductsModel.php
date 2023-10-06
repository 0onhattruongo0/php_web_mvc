<?php
// Kế thừa từ class Model
class ProductsModel{
    protected $_table = "products";
    public function getList(){
        $data=[
            'sản phẩm 1',
            'sản phẩm 2',
            'sản phẩm 3'
        ];
        return $data;
    }
    public function getDetail($id){
        $data=[
            'sản phẩm 1',
            'sản phẩm 2',
            'sản phẩm 3'
        ];
        return $data[$id];
    }

}