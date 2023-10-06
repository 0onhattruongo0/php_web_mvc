<?php
class Login extends Controller{
    public function index(){
        $this->render('admin/login');
        // $request = new Request();
        // if($request->isPost()){
        //     // set rules
        //     $request->rules([
        //         'username' => 'required|min:5|max:30',
        //         'password'=> 'required|min:3',
        //     ]);

        //     // set message
        //     $request->message([
        //         'username.required' => 'Ho ten ko dc de trong',
        //         'username.min' => 'Ho ten nho nhat 5 ky tu',
        //         'username.max' => 'Ho ten lon nhat 30 ky tu',
        //         'password.required' => 'mat khau ko dc de trong',
        //         'password.min' => 'mat khau co it nhat 3 ky tu',
        //     ]);
        //     $validate = $request->validate();
        //     if(!$validate){
        //         $response = new Response();
        //         $response->redirect('admin/login');
        //     }
        // }

        // $response = new Response();
        // $response->redirect('home');

    }
    public function post_user(){
        // $userId = 1;
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
                'password.required' => 'mat khau ko dc de trong',
                'password.min' => 'mat khau co it nhat 3 ky tu',
            ]);
            $validate = $request->validate();
            // echo $request->errors('fullname');
            // var_dump($validate);
            // echo "<pre>";
            // print_r($request->errors);
            // echo "<pre>";
            if(!$validate){
                // $this->data['errors'] = $request->errors();
                // $this->data['msg'] = "Đã có lỗi xảy ra vui lòng thử lại";
                // $this->data['old'] = $request->getFields();

                // Session::flash('errors',$request->errors());
                // Session::flash('msg','Đã có lỗi xảy ra vui lòng thử lại');
                // Session::flash('old',$request->getFields());
            }
            // $this->render('users/add',$this->data);
        }
        // else{
        //     $response = new Response();
        //     $response->redirect('home/get_user');
        // }
        
        $response = new Response();
        $response->redirect('admin/login');
        
    }
}