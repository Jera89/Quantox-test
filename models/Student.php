<?php

class Student {
    
    private $table_name;
    private $sqli;
    
    public function __construct($sqli)
    {
        $this->setTableName("students");
        $this->sqli = $sqli;
    }
    
    public function getTableName()
    {
        return $this->table_name;
    }
    
    public function setTableName($value){
            $this->table_name = $value;
    }
    
    public function getSqliObject(){
        return $this->sqli;
    }
    
    public function setSqliObject($value)
    {
        $this->sqli = $value;
    }
    
    public function load()
    {
        if(!isset($this->id)){
            return false;
        }
        $query = "SELECT * FROM " . $this->getTableName() . " WHERE id = " . $this->id;
        $res = $this->sqli->sqlQuery($query);
        if(!$res){
            return false;
        }
        if($row = $res->fetch_object()){
            $this->id   = $row->id;
            $this->name = $row->name;
            $this->board_id = $row->board_id;
        }
        return $this;
    }
    
    public function getGrades()
    {
        $grades = [];
        
        $query = "SELECT * FROM grades WHERE student_id = ". $this->id;
        $res = $this->sqli->sqlQuery($query);
        if(!$res){
            return false;
        }
        while($row = $res->fetch_object()){
            $grades[] = $row;
        }
        $this->grades = $grades;
        return $this->grades;
    }
    
    public function getBoard()
    {
        
        $board;
        
        $query = "SELECT * FROM boards WHERE id = ". $this->board_id;
        $res = $this->sqli->sqlQuery($query);
        if(!$res){
            return false;
        }
        while($row = $res->fetch_object()){
          $board = $row;
        }
        $this->board = $board;
        return $this->board;
        
    }
    
}

