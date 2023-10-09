<?php

class AuthMiddleware extends Middleware{
    public function handle()
    {
        if(!empty(Session::data('user_login'))){
            return true;
        }
        $response = new Response();
        $response->redirect('admin/login');
    }
}