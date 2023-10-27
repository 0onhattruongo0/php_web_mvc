<?php
// Kế thừa từ class Model
class CategoriesModel extends Model{
    function tableFill(){
        return 'category';
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return "id";
    }
    public function insertCat($data)
    {
        $this->db->table('category')->insert($data);
        return $this->db->lastId();
    }
    public function updateCat($data,$id)
    {
        $this->db->table('category')->where('id','=',$id)->update($data);
    }
    public function deleteCategory($id){
        $this->db->table('category')->where('id','=',$id)->delete();
    }
}