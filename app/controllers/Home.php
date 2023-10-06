<?php
class Home extends Controller{
    public $model_home,$data;
    public function __construct(){

        // require_once _DIR_ROOT.'/app/models/HomeModel.php';
        // $this->model_home = new HomeModel();
        // dùng base controller k can dung nữa


        $this->model_home = $this->model('HomeModel'); // ke thua tu base controller;
    }
    public function index(){
        // $data = $this->model_home->get();
        // $data = $this->model_home->getListTest();
        // echo "<br>";
        // print_r($data);
        // echo "<br>";
        // $details = $this->model_home->find(3);
        // echo "<br>";
        // print_r($details);
        // echo "<br>";
        // $data = $this->model_home->getList();
        // $data = [ 
        //     'test_name'=>'fsd'
        // ];
        $data = $this->db->table('test')->get();
        // echo "<br>";
        // print_r($data);
        // echo "<br>";
        // $this->model_home->deleteTest(7);

        // $check = Session::data('age','26');
        // var_dump($check);
        // $sessionData =  Session::data('username');
        // var_dump($sessionData);
        // $sessionData =  Session::data();
        // var_dump($sessionData);
        // $deleteSession = Session::delete('username');
        // var_dump($deleteSession);

        // $msg = Session::flash('msg','Thêm dữ liệu thành công');
        $msg = Session::flash('msg');
        echo $msg;
    }
    public function details($id=''){
        $data = $this->model_home->getDetail($id);
        // var_dump($data);
    }
    // public function search($keyword=''){
    //     $keyword = $_GET['keyword'];
    //     echo "Từ khóa cần tìm:".$keyword;
    // }

    public function get_user(){
        // $request = new Request();
        // $this->data['errors'] = Session::flash('errors');
        $this->data['msg'] = Session::flash('msg');
        $this->data['old'] = Session::flash('old');
        $this->render('users/add',$this->data);
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
                Session::flash('msg','Đã có lỗi xảy ra vui lòng thử lại');
                Session::flash('old',$request->getFields());
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