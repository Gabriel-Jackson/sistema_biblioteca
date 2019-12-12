<?php
    $host = "db";
    $db_name = "biblioteca";

    $db_user = "root";
    $db_pass = "root";
    
    try {
        $connect = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8',
                            $db_user,$db_pass);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }



?>