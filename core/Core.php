<?php
class Core
{

    public function run(){
        $url = explode("index.php",$_SERVER['PHP_SELF']);
        $url = end($url);
        if(!empty($url)){
            $url = explode('/',$url);
            array_shift($url);

            $currentController = $url[0].'Controller';

            if(isset($url[1])){
                $currentAction = $url[1];
                array_shift($url);
            }else{
                $currentAction = 'index';
            }

            $params = $url;

        }else{
            $currentController = 'homeController';
            $currentAction = 'index';
            $params = array();
        }

        require_once 'core/controller.php'; 
        $c = new $currentController();
        call_user_func_array(array($c,$currentAction),$params); 
    }
}

