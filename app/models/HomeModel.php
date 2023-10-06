<?php
// Kế thừa từ class Model
class HomeModel extends Model{
    function tableFill(){
        return 'test';
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return "id";
    }

    public function getList(){
        // $data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        // $data = $this->get();
        // return $data;
    }
    public function getDetail($id){
        $data=[
            'Item01',
            'Item02',
            'Item03'
        ];
        return $data[$id];
    }
    public function getListTest(){
        $data = $this->db->table('test')->limit(3,1)->get();
        return $data;
    }

    public function getTestDetail($name){
        $data = $this->db->table('test')->where('test_name','=',$name)->first();
        return $data;
    }

    public function insertTest($data)
    {
        $this->db->table('test')->insert($data);
        return $this->db->lastId();
    }
    public function updateTest($data,$id)
    {
        $this->db->table('test')->where('id','=',$id)->update($data);
    }
    public function deleteTest($id)
    {
        $this->db->table('test')->where('id','=',$id)->delete();
    }
}