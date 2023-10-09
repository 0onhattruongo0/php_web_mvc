<?php
// Kế thừa từ class Model
class UserModel extends Model{
    function tableFill(){
        return 'user';
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return "id";
    }

    public function insertUsers($data)
    {
        $this->db->table('user')->insert($data);
        return $this->db->lastId();
    }
    public function updateUsers($data,$id)
    {
        $this->db->table('user')->where('id','=',$id)->update($data);
    }
    public function deleteUsers($id)
    {
        $this->db->table('user')->where('id','=',$id)->delete();
    }
}