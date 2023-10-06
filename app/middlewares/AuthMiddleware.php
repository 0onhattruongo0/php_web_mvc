<?php

class AuthMiddleware extends Middleware{
    public function handle()
    {
        // var_dump($this->db);
        // $homeModel = Load::model('HomeModel');
        // var_dump($homeModel);
        if(Session::data('admin_login') == null){
            $response = new Response();
            // $response->redirect('trang-chu');
        }
    }
}