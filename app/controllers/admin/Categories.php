<?php
class Categories extends Controller{
    public $data,$model_cat;
    public function __construct()
    {
        $this->model_cat = $this->model('CategoriesModel');
    }
    public function index(){
        $data['sub_content']['categories'] = $this->model_cat->all();
        $data['content'] = 'admin/categories/index'; 
        $this->render('admin/layout_master',$data);
    }
    public function add(){
        $request = new Request();
        if($request->isPost()){
            $request->rules([
                'name' => 'required|unique:category:name|min:2|max:30',
            ]);
            $request->message([
                'name.required' => 'ko dc de trong',
                'name.unique' => 'danh muc da ton tai',
                'name.min' => 'It nhat 2 ky tu',
                'name.max' => 'Nhieu nhat chi 30 ky tu',
            ]);
            $validate = $request->validate();
            if(!$validate){
                $response = new Response();
                $response->redirect('admin/categories/add');
            }else{
                $data = $request->getFields();
                $this->model_cat->insertCat($data);
                $response = new Response();
                Session::flash('success','Thêm thành công');
                $response->redirect('admin/categories');
            }
        }
        // $data['sub_content'][] = '';
        $data['content'] = 'admin/categories/add'; 
        $this->render('admin/layout_master',$data);
    }
    public function edit($id=''){
        $request = new Request();
        if($request->isGet()){
            $data_id = $id;
            $data_user=$this->model_cat->find($data_id);
            $data['sub_content']['id'] = $data_id;
            $data['sub_content']['category'] = $data_user;
            $data['content'] = 'admin/categories/edit'; 
            $this->render('admin/layout_master',$data);
        }

        if($request->isPost()){
            $id = $request->getFields()['id'];
            // set rules
            $request->rules([
                'name' => 'required|min:2|max:30|unique:category:name:id='.$id
            ]);

            // set message
            $request->message([
                'name.required' => 'ko dc de trong',
                'name.min' => 'Nho nhat 2 ky tu',
                'name.max' => 'Lon nhat 30 ky tu',
                'name.unique' => 'Danh muc đã tồn tại',
            ]);
            $validate = $request->validate();
            if(!$validate){
                $response = new Response();
                $response->redirect('admin/categories/edit/'.$id.'');
            }
            else{
                $data = [];
                $data_all = $request->getFields();
                foreach($data_all as $key=>$value){
                    if($key !== 'id'){
                        $data[$key] = $value;
                    }
                }
                $this->model_cat->updateCat($data , $id);
                $response = new Response();
                Session::flash('info','Sửa thành công');
                $response->redirect('admin/categories');
            }
        }
    }
    public function delete($id){
        $request = new Request();
        if($request->isGet()){
            // var_dump($id);die;
            $this->model_cat->deleteCategory($id);
            $response = new Response();
            Session::flash('danger','Xóa thành công');
            $response->redirect('admin/categories');
        }
    }
}