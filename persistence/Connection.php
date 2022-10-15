<?php

class Connection{
    private $mysqli;
    private $result;
    
    function open(){
        $this -> mysqli = new mysqli("localhost", "root", "", "basic_exercise");
        $this -> mysqli -> set_charset("utf8");
    }
    
    function close(){
        $this -> mysqli -> close();
    }
    
    function execute($sentence){
        $this -> result = $this -> mysqli -> query($sentence);
    }
    
    function extract(){
        return $this -> result -> fetch_row();        
    }
    
    function numRows(){
        return ($this -> result != null) ? $this -> result -> num_rows : 0;
    }
}