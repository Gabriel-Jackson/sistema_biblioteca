<?php
class model{

    protected $db;

    public function __construct(){
        
        global $config;
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset=utf8',$config['dbuser'],$config['dbpass']);

    }
}

