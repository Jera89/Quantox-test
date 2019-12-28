<?php

class sqli {
    
    public $server    = "localhost";
    public $database  = "quantox-test";      
    public $user      = "phpmyadmin";
    public $pass      = "urajenje89!"; 
    public $connection;
             
    function __construct($server = "", $database = "", $user = "", $pass = "") {
        if($server != ""){
            $this->server = $server;
        }
        if($database != ""){
            $this->database = $database;
        }
        if($user != ""){
            $this->user = $user;
        }
        if($this->pass != ""){
            $this->pass    = $pass;
        }
    }
    
    function dbConnect(){
        $connection = new mysqli();
        $connection->connect($this->server, $this->user, $this->pass, $this->database);
        if($connection->connect_errno){
            //hendlovati drugacije
            printf("Connect failed: %s\n", $connection->connect_error);
            exit();
        }
        else{
            $connection->set_charset("utf8");
            $this->connection = $connection;
        }
    }

    function sqlQuery($query = ""){
        if(!$res=$this->connection->query($query)){
            return false;
        }
        else{
            return $res;
        }
    }

}

