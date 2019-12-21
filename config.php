<?php
require "environment.php";

global $config;
$config = array();

if(ENVIRONMENT == "development"){
    $config['dbname'] = 'biblioteca';
    $config['host'] = "db";
    $config['dbuser'] = "root";
    $config['dbpass'] = "root";

} else{
    $config['dbname'] = 'biblioteca';
    $config['host'] = "db";
    $config['dbuser'] = "root";
    $config['dbpass'] = "root";
}
    
    try {
        $connect = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8',
                            $db_user,$db_pass);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>