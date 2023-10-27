<?php
// Kế thừa từ class Model
class ProductsModel extends Model{
    function tableFill(){
        return 'products';
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return "id";
    }

    // public function insertUsers($data)
    // {
    //     $this->db->table('products')->insert($data);
    //     return $this->db->lastId();
    // }
    // public function updateUsers($data,$id)
    // {
    //     $this->db->table('user')->where('id','=',$id)->update($data);
    // }
    // public function deleteUsers($id)
    // {
    //     $this->db->table('user')->where('id','=',$id)->delete();
    // }
}