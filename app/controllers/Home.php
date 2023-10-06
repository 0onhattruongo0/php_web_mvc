<?php
class Home extends Controller{
    public $model_home,$data;
    public function __construct(){

    }
    public function index(){
        $data['content'] = 'home/index';
        $this->render('layouts/client_layout',$data);
    }
    public function details($id=''){
        $data = $this->model_home->getDetail($id);
    }


    public function get_user(){
        // $this->data['msg'] = Session::flash('msg');
        // $this->data['old'] = Session::flash('old');
        $this->render('users/add');
    }
    public function post_user(){
        // $userId = 1;
        $request = new Request();
        // var_dump($request->isPost());
        if($request->isPost()){
            // set rules
            $request->rules([
                'fullname' => 'required|min:5|max:30',
                // 'email' => 'required|email|min:6|unique:user:email:id='.$userId,
                'email' => 'required|email|min:6|unique:user:email',
                'age' => 'required|callback_check_age',
                'password'=> 'required|min:3',
                'confirm_password' => 'required|match:password'
            ]);

            // set message
            $request->message([
                'fullname.required' => 'Ho ten ko dc de trong',
                'fullname.min' => 'Ho ten nho nhat 5 ky tu',
                'fullname.max' => 'Ho ten lon nhat 30 ky tu',
                'email.required' => 'email ko dc de trong',
                'email.email' => 'dinh dang email ko dung',
                'email.min' => 'email it nhat co 6 ky tu',
                'email.unique' => 'email đã tồn tại',
                'age.required' => 'tuoi ko dc de trong',
                'age.callback_check_age' => 'tuoi ko dc nho hon 20',
                'password.required' => 'mat khau ko dc de trong',
                'password.min' => 'mat khau co it nhat 3 ky tu',
                'confirm_password.required' => 'Nhap lai mat khau ko dc de trong',
                'confirm_password.match' => 'Mat khau nhap lai khong khop',
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
        $response->redirect('home/get_user');
        
    }

    public function check_age($age){
        if($age>20) return true;
        return false;
    }
}