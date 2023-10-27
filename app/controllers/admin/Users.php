<?php
class Users extends Controller{
    public $data,$model_user;
    public function __construct()
    {
        $this->model_user = $this->model('UserModel');
    }
    public function index(){
        $data['sub_content']['users'] = $this->model_user->all();
        $data['content'] = 'admin/users/index'; 
        $this->render('admin/layout_master',$data);
    }
    public function add(){

        $request = new Request();
        if($request->isPost()){
            // set rules
            $request->rules([
                'name' => 'required|min:2|max:30',
                'username' => 'required|min:5|max:30|unique:user:username',
                'email' => 'required|email|min:6|unique:user:email',
                'password'=> 'required|min:3',
                'confirm_password' => 'required|match:password'
            ]);

            // set message
            $request->message([
                'name.required' => 'Ho ten ko dc de trong',
                'name.min' => 'Ho ten nho nhat 2 ky tu',
                'name.max' => 'Ho ten lon nhat 30 ky tu',
                'username.required' => 'Ho ten ko dc de trong',
                'username.min' => 'Ho ten nho nhat 5 ky tu',
                'username.max' => 'Ho ten lon nhat 30 ky tu',
                'username.unique' => 'Ten dang nhap đã tồn tại',
                'email.required' => 'email ko dc de trong',
                'email.email' => 'dinh dang email ko dung',
                'email.min' => 'email it nhat co 6 ky tu',
                'email.unique' => 'email đã tồn tại',
                'password.required' => 'Mat khau ko dc de trong',
                'password.min' => 'Mat khau co it nhat 3 ky tu',
                'confirm_password.required' => 'Nhap lai mat khau ko dc de trong',
                'confirm_password.match' => 'Mat khau nhap lai khong khop',
            ]);
            $validate = $request->validate();
            if(!$validate){
                
                $response = new Response();
                $response->redirect('admin/users/add');
            }else{
                $data = [];
                $data_all = $request->getFields();
                foreach($data_all as $key=>$value){
                    if($key !== 'confirm_password'){
                        $data[$key] = $value;
                    }
                }
                $this->model_user->insertUsers($data);
                $response = new Response();
                Session::flash('success','Thêm thành công');
                $response->redirect('admin/users');
            }
        }
        $data['sub_content'][] = '';
        $data['content'] = 'admin/users/add'; 
        $this->render('admin/layout_master',$data);
    }

    public function edit($id=''){
        $request = new Request();
        if($request->isGet()){
            $data_id = $id;
            $data_user=$this->model_user->find($data_id);
            $data['sub_content']['id'] = $data_id;
            $data['sub_content']['user'] = $data_user;
            $data['content'] = 'admin/users/edit'; 
            $this->render('admin/layout_master',$data);
        }

        if($request->isPost()){
            $id = $request->getFields()['id'];
            // set rules
            $request->rules([
                'name' => 'required|min:2|max:30',
                'username' => 'required|min:5|max:30|unique:user:username:id='.$id,
                'email' => 'required|email|min:6|unique:user:email:id='.$id,
            ]);

            // set message
            $request->message([
                'name.required' => 'Ho ten ko dc de trong',
                'name.min' => 'Ho ten nho nhat 2 ky tu',
                'name.max' => 'Ho ten lon nhat 30 ky tu',
                'username.required' => 'Ho ten ko dc de trong',
                'username.min' => 'Ho ten nho nhat 5 ky tu',
                'username.max' => 'Ho ten lon nhat 30 ky tu',
                'username.unique' => 'Ten dang nhap đã tồn tại',
                'email.required' => 'email ko dc de trong',
                'email.email' => 'dinh dang email ko dung',
                'email.min' => 'email it nhat co 6 ky tu',
                'email.unique' => 'email đã tồn tại',
            ]);
            $validate = $request->validate();
            if(!$validate){
                
                $response = new Response();
                $response->redirect('admin/users/edit/'.$id.'');
            }else{
                $data = [];
                $data_all = $request->getFields();
                foreach($data_all as $key=>$value){
                    if($key !== 'id'){
                        $data[$key] = $value;
                    }
                }
                $this->model_user->updateUsers($data , $id);
                $response = new Response();
                Session::flash('info','Sửa thành công');
                $response->redirect('admin/users');
            }
        }
    }

    public function delete($id){
        $request = new Request();
        if($request->isGet()){
            $data_id = $id;
            $this->model_user->deleteUsers($data_id);
            $response = new Response();
            Session::flash('danger','Xóa thành công');
            $response->redirect('admin/users');
        }
    }
}