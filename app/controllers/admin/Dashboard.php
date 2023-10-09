<?php
class Dashboard extends Controller{
    public $data = [];
    public function index(){
        $data['sub_content'][] = '';
        $data['content'] = 'admin/dashboard'; 
        $this->render('admin/layout_master',$data);
    }
}