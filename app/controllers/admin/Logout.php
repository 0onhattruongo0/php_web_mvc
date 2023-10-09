<?php
class Logout extends Controller{
    public function index(){
            Session::delete('user_login');
            $response = new Response();
            $response->redirect('admin/login');
        }
}