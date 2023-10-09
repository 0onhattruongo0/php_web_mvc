<?php
class Login extends Controller{
    public $data;
    public function index(){
        $this->render('admin/login');
        $request = new Request();
        if($request->isPost()){
            // set rules
            $request->rules([
                'username' => 'required|min:5|max:30',
                'password'=> 'required|min:3',
            ]);

            // set message
            $request->message([
                'username.required' => 'Ho ten ko dc de trong',
                'username.min' => 'Ho ten nho nhat 5 ky tu',
                'username.max' => 'Ho ten lon nhat 30 ky tu',
                'password.required' => 'Mat khau ko dc de trong',
                'password.min' => 'Mat khau co it nhat 3 ky tu',
            ]);
            $validate = $request->validate();
            if(!$validate){
                $response = new Response();
                $response->redirect('admin/login');
            }else{
                $username = $request->getFields()['username'];
                $password = $request->getFields()['password'];

                if(!empty($username) && !empty($password)){
                    $check = $this->db->table('user')->where('username','=',$username)->Where('password','=',md5($password))->get();
                    if(!empty($check)){
                        Session::data('user_login',$check);
                        $response = new Response();
                        $response->redirect('admin/dashboard');
                    }
                }
            }
        }

        

    }
}