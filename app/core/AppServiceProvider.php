<?php
class AppServiceProvider extends ServiceProvider{
    public function boot(){
        // $dataUser = $this->db->table('user')->where('id', '=',1)->first();
        // $data['info'] = $dataUser;
        $data['menuArrClient'] =[
            [
                'title' => 'Home',
                'link' => '#'
            ],
            [
                'title' => 'Maternity Jewelry',
                'link' => '#'
            ],
            [
                'title' => 'Necklace',
                'link' => '#'
            ],
            [
                'title' => 'Babyring',
                'link' => '#'
            ],
            [
                'title' => 'Charm',
                'link' => '#'
            ],
            [
                'title' => 'Maternity Gift',
                'link' => '#'
            ],
        ];
        View::share($data);
    }
}