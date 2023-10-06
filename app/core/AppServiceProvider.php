<?php
class AppServiceProvider extends ServiceProvider{
    public function boot(){
        $dataUser = $this->db->table('user')->where('id', '=',1)->first();
        $data['info'] = $dataUser;
        View::share($data);
    }
}