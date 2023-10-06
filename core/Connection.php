<?php
class Connection {
    private static $instance=null,$conn=null;
    private function __construct($config)
    {
        // Ket noi database
        try{
            $dsn = 'mysql:dbname='.$config['db'].';host='.$config['host'];
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            // Cau lenh ket noi
            if(!empty($config['pass'])){
                $con = new PDO($dsn, $config['user'],$config['pass'], $options);
            }else{
                $con = new PDO($dsn, $config['user'],'', $options);
            }
            
            

            self::$conn = $con;
        }catch (Exception $e){
            $mess = $e->getMessage();
            $data['message'] = $mess;
            App::$app->loadError('database',$data);
            die();
        }
       

    }
    public static function getInstance($config){
        if(self::$instance == null){
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}