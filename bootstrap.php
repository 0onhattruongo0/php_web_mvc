<?php
// define('_DIR_ROOT', __DIR__);
define('_DIR_ROOT', str_replace('\\', '/', __DIR__));


// Xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root ='https://'.$_SERVER['HTTP_HOST'];
}else{
    $web_root ='http://'.$_SERVER['HTTP_HOST'];
}
// echo $_SERVER['DOCUMENT_ROOT'];
// echo "<br>";
// echo _DIR_ROOT;
// echo "<br>";

$documentRoot = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);

$folder = str_replace(strtolower($documentRoot),'',strtolower(_DIR_ROOT));
// echo $folder;

$web_root = $web_root.$folder;

define('__WEB_ROOT',$web_root);

// tu dong load configs
$configs_dir = scandir('configs');
if(!empty($configs_dir)){
    foreach($configs_dir as $item){
        
        if($item !== '.' && $item !== '..' && file_exists('configs/'.$item)){
            require_once 'configs/'.$item;
        }
    }
}

// load all service
if(!empty($config['app']['service'])){
    $allServices = $config['app']['service'];
    if(!empty($allServices)){
        foreach($allServices as $serviceName){
            if(file_exists('app/core/'.$serviceName.'.php')){
                require_once 'app/core/'.$serviceName.'.php';
            }
        }
    }
}

// Load Service Provider Class
require_once "./core/ServiceProvider.php";

// Load View Class
require_once "./core/View.php"; //để share dữ liệu các view khác nhau

// Load
require_once "./core/Load.php";

// Middleware
require_once "./core/Middlewares.php";

require_once "./core/Route.php";

require_once "./core/Session.php";

// kiem tra config va load database
if($config['database']){
    $db_config = array_filter($config['database']);
    if(!empty($db_config)){
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
        
        // $database = new Database();
        // $query= $database->query("SELECT * FROM test")->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($query);
    }
}

// Load core helpers
require_once 'core/Helper.php';

// Load all helper
$all_helpers = scandir('app/helpers');
if(!empty($all_helpers)){
    foreach($all_helpers as $item){
        
        if($item !== '.' && $item !== '..' && file_exists('app/helpers/'.$item)){
            require_once 'app/helpers/'.$item;
        }
    }
}
require_once "./app/App.php";

require_once "core/Model.php"; //load base model

require_once "core/Template.php"; //template engine

require_once "core/Controller.php"; //load base controller

require_once "core/Request.php";  //load Requet

require_once "core/Response.php";  //load Response