<?php

class App {

    private $__controller,$__action,$__params,$__route, $__db;
    static public $app;
  

    function __construct()
    {
        global $routes;
        self::$app = $this;
        if(!empty($routes['default_controller'])){
            $this->__controller = $routes['default_controller'];
        }
        
        $this->__action='index';
        $this->__params=[];
        $this->__route= new Route();

        // tao global querybuilder
        if(class_exists('DB')){
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }
        $this->handleUrl();
    }
    function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }else{
            $url = "/";
        }
        return $url;
    }


 
    function handleUrl(){

        $url = $this->getUrl();

        // thay doi tuy y url
        $url = $this->__route->handleRoute($url);

        // Middleware
        $this->handleGlobalMiddleWare($this->__db);
        $this->handleRouteMiddleWare($this->__route->getUri(),$this->__db);

        // App Service Provider
        $this->handleAppServiceProvider($this->__db);

        $urlArray =  array_filter(explode("/",$url));
        $urlArray =  array_values($urlArray);

        // echo "<pre>";
        // print_r($urlArray);
        // echo "</pre>";


        // kiem tra phai la file ko?

        if(!empty($urlArray)){
            $urlCheck = '';
            foreach ($urlArray as $key=>$item){
                $urlCheck .= $item.'/';
                $fileCheck = rtrim($urlCheck,'/');
                $fileArr = explode('/',$fileCheck);
                $fileArr[count($fileArr)-1] = ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck = implode('/',$fileArr);

                if(!empty($urlArray[$key-1])){
                    unset($urlArray[$key-1]); // loai bo thu muc chua file di
                };

                if(!empty(file_exists('app/controllers/'.$fileCheck.'.php'))){
                    $urlCheck = $fileCheck;
                    break;
                }

            }

            $urlArray =  array_values($urlArray);
        }

        

        // echo "<pre>";
        // print_r($urlArray);
        // echo "</pre>";


        // Xử lý controller
        if(!empty($urlArray[0])){
            $this->__controller = ucfirst($urlArray[0]);   
        }else{
            $this->__controller = ucfirst($this->__controller);   
        }

        // Xu ly khi url rong
        if(empty($urlCheck)){
            $urlCheck = $this->__controller;
        }

        if(!empty(file_exists('app/controllers/'.$urlCheck.'.php'))){
            require_once 'controllers/'.$urlCheck.'.php';
            if(!empty(class_exists($this->__controller))){
                $this->__controller = new $this->__controller();
                unset($urlArray[0]);

                // de tao global query Buider
                if(!empty($this->__db)){
                    $this->__controller->db = $this->__db;
                }
                
            }else{
                $this->loadError();
            }
        }else{
            $this->loadError();
        }


        // Xử lý action
        if(!empty($urlArray[1])){
            $this->__action = $urlArray[1];
            unset($urlArray[1]);
        }
        

        // Xử lý params
        $this->__params =array_values($urlArray);
        if(method_exists($this->__controller,$this->__action)){
            
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
            
        }else{
            $this->loadError();
        }
    }

    public function getCurrentController(){
        return $this->__controller;
    }

    public function loadError($name='404',$data=[]){
        extract($data);
        require_once 'errors/'.$name.'.php';
    }

    // Middleware

    public function handleRouteMiddleWare($routeKey,$db){
        
        global $config;
        $routeKey= trim($routeKey);
        if(!empty($config['app']['routeMiddleware'])){
            
            $routeMiddleWareArr= $config['app']['routeMiddleware'];

            foreach($routeMiddleWareArr as $key=>$middleWareItem){
                $check = preg_match('~'.trim($key).'.+~',$routeKey,$matches);
                // var_dump($matches[0]);
                if($routeKey == $matches[0] && file_exists('app/middlewares/'.$middleWareItem.'.php')){
                    
                    require_once 'app/middlewares/'.$middleWareItem.'.php';
                    
                    if(class_exists($middleWareItem)){
                        $middleWareObject = new $middleWareItem();
                       
                        if(!empty($db)){
                            $middleWareObject->db = $db;
                        }
                        $middleWareObject->handle();
                    }
                }
            }
        }
    }

    public function handleGlobalMiddleWare($db){
        global $config;
        if(!empty($config['app']['globalMiddleware'])){
            $globalMiddleware= $config['app']['globalMiddleware'];
            foreach($globalMiddleware as $middleWareItem){
                if(file_exists('app/middlewares/'.$middleWareItem.'.php')){
                    require_once 'app/middlewares/'.$middleWareItem.'.php';
                    
                    if(class_exists($middleWareItem)){
                        $middleWareObject = new $middleWareItem();
                        if(!empty($db)){
                            $middleWareObject->db = $db;
                        }
                        $middleWareObject->handle();
                    }
                }
            }
        }
        
    }

    public function handleAppServiceProvider($db){
        global $config;
        if(!empty($config['app']['boot'])){
            $serviceProvider= $config['app']['boot'];
            foreach($serviceProvider as $serviceName){
                if(file_exists('app/core/'.$serviceName.'.php')){
                    require_once 'app/core/'.$serviceName.'.php';   
                    if(class_exists($serviceName)){
                        $serviceObject = new $serviceName();
                        
                        if(!empty($db)){
                            $serviceObject->db =$db;
                        }
                        $serviceObject->boot();
                    }
                }
            }
        }
    }
}