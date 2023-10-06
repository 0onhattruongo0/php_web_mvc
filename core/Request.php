<?php
class Request{

    private $__rules= [],$__message=[],$__errors = [];
    public $db;

    public function __construct() {
        $this->db = new Database ;
    }

    public function getMethod(){
       return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost(){
        if($this->getMethod()=='post'){
            return true;
        }
        return false;
    }

    public function isGet(){
        if($this->getMethod()=='get'){
            return true;
        }
        return false;
    }

    public function getFields(){
        $dataFields = [];
        if($this->isGet()){
            // echo '<pre>';
            // print_r($_GET);
            // echo '<pre>';
            if(!empty($_GET)){
                foreach($_GET as $key=>$value){
                    if(is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                    }else{
                        $dataFields[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    }
                    
                }
            }
        }
        if($this->isPost()){
            // echo '<pre>';
            // print_r($_GET);
            // echo '<pre>';
            if(!empty($_POST)){
                foreach($_POST as $key=>$value){
                    if(is_array($value)){
                        $dataFields[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                    }else{
                        $dataFields[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $dataFields;
    }

    // set rules
    public function rules($rules=[]){
        $this->__rules = $rules;
        // echo "<pre>";
        // print_r($this->__rules);
        // echo "<pre>";
    }

    // set message
    public function message($message=[]){
        $this->__message= $message;
        // echo "<pre>";
        // print_r($this->__message);
        // echo "<pre>";
    }

    // Run validate
    public function validate(){
        $dataFields = $this->getFields();
        $this->__rules = array_filter($this->__rules);
        $checkValidate = true;
        if(!empty($this->__rules)){
            foreach($this->__rules as $fieldsName=>$ruleItem){
                $ruleItemArr = explode('|',$ruleItem);

                
                foreach($ruleItemArr as $rules){
                    $ruleName= null;
                    $ruleValue= null;

                    $ruleArr = explode(':',$rules);
                    $ruleName = reset($ruleArr); //lay phan tu dau tien
                  
                    if(count($ruleArr)>1){
                        $ruleValue = end($ruleArr);
                    }

                    if($ruleName == 'required'){
                        if(empty(trim($dataFields[$fieldsName]))){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                        }
                    }

                    if($ruleName == 'min'){
                        if(strlen(trim($dataFields[$fieldsName])) < $ruleValue){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                        }
                    }

                    if($ruleName == 'max'){
                        if(strlen(trim($dataFields[$fieldsName])) > $ruleValue){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'email'){
                        if(!filter_var($dataFields[$fieldsName],FILTER_VALIDATE_EMAIL)){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == 'match'){
                        if(trim($dataFields[$fieldsName]) != trim($dataFields[$ruleValue])){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                        }
                    }
                    if($ruleName == "unique"){
                        $tableName =null;
                        $fieldCheck = null;
                        if(!empty($ruleArr[1])){
                            $tableName = $ruleArr[1];
                        }
                        if(!empty($ruleArr[2])){
                            $fieldCheck = $ruleArr[2];
                        }
                        if(!empty($tableName) && !empty($fieldCheck)){
                            if(count($ruleArr)==3){
                                $con = trim($dataFields[$fieldsName]);
                                $checkExits = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck ='$con'")->rowCount();
                                // var_dump($checkExits);
                            }elseif(count($ruleArr)==4){
                                if(!empty($ruleArr[3]) && preg_match('~.+?\=.+?~',$ruleArr[3])){
                                    $conditionWhere = $ruleArr[3];
                                    $conditionWhere = str_replace('=','<>',$conditionWhere);
                                    $con = trim($dataFields[$fieldsName]);
                                    $checkExits = $this->db->query("SELECT $fieldCheck FROM $tableName WHERE $fieldCheck ='$con' AND $conditionWhere")->rowCount();
                                }
                            }

                           
                          if(!empty($checkExits)){
                            $this->setErrors($fieldsName,$ruleName);
                            $checkValidate = false;
                          }
                        }
                    }
                    // callback validate
                    if(preg_match('~^callback_(.+)~is',$ruleName, $callbackArr)){
                       if(!empty($callbackArr[1])){
                        $callbackName = $callbackArr[1];
                        $controller =  App::$app->getCurrentController();
                        if(method_exists($controller, $callbackName)){
                            $checkCallback = call_user_func_array([$controller, $callbackName],[trim($dataFields[$fieldsName])]);
                            // var_dump($checkCallback);
                            if(empty($checkCallback)){
                                $this->setErrors($fieldsName,$ruleName);
                                $checkValidate = false;
                              }
                        }
                       }
                    }
                }
            }
        }
        $sessionKey = Session::isInvalid();
        Session::flash($sessionKey.'_errors',$this->errors());
        Session::flash($sessionKey.'_old',$this->getFields());
        return $checkValidate;
    }

    // get errors
    public function errors($fieldsName=''){
        if(!empty($this->__errors)){
            if(empty($fieldsName)){
                $errorsArr = [];
                foreach ($this->__errors as $key=>$error){
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
            }
            return reset($this->__errors[$fieldsName]);
        }
        return false;
    }

    // set errors
    public function setErrors($fieldsName,$ruleName){
        $this->__errors[$fieldsName][$ruleName] = $this->__message[$fieldsName.'.'.$ruleName];
    }
}