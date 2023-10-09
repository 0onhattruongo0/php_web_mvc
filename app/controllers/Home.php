<?php
class Home extends Controller{
    public $data;
    public function index(){
        $data['content'] = 'home/index';
        $this->render('layouts/client_layout',$data);
    }
}