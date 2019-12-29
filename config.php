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
?>