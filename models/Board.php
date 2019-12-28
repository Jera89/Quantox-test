<?php

class Board {
    
    private $table_name;
    private $sqli;
    
    public function __construct($sqli)
    {
        $this->setTableName("boards");
        $this->sqli = $sqli;
    }
    
    public function getTableName(){
        return $this->table_name;
    }
    
    public function setTableName($value){
            $this->table_name = $value;
    }
    
    public function getSqliObject(){
        return $this->sqli;
    }
    
    public function setSqliObject($value){
        $this->sqli = $value;
    }
    
}

