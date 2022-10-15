<?php
class CustomerDAO{
    private $id;
    private $name;
    private $lastname;
    private $city;
    private $mail;
    private $password;
    
    function CustomerDAO ($pId, $pName, $pLastname, $pCity, $pMail, $pPassword) {
        $this -> id = $pId;
        $this -> name = $pName;
        $this -> lastname = $pLastname;
        $this -> city = $pCity;
        $this -> mail = $pMail;
        $this -> password = $pPassword;          
    }
    
    function create () {
        return "insert into customer (id, name, lastname, city, mail, password)
                values ('" . $this -> id . "','" . $this -> name . "', '" . $this -> lastname . "','" . $this -> city . 
                "','" . $this -> mail . "','" . md5 ($this ->  password) . "')";        
    }
    
    function authenticate () {
        return "select id from customer
                where mail = '" . $this -> mail . "' and password = md5('" . $this -> password . "')";
    }
    
    function consult_exists($id){
        return "select id
                from customer where id = '" . $id . "'";
    }
       
    function consult(){
        return "select name, lastname, city, mail, password
                from customer where id = '" . $this -> id . "'";
    }
    
    function consultMail($mail){
        return "select mail
                from customer where mail = '" . $mail . "'";
    }
    
    function consultName($mail){
        return "select name
                from customer where mail = '" . $mail . "'";
    }
    
    function consultLastName($mail){
        return "select lastname
                from customer where customer = '" . $mail . "'";
    }
    
    function edit(){
        return "update customer
                set name = '".$this -> name . "', lastname ='" . $this -> lastname . "', city ='" . $this -> city . 
                "', mail = '" . $this -> mail . "' , password = '" . $this -> password . "' where id = '" . 
                $this -> id . "'";
    }
    
    function editPassword($password,$mail){
        return "update customer
                set password = '" . md5 ($password) . "'
                where mail = '" . $mail . "'";
    }
    
    function deleteAccount(){
        return "delete from customer where id = '".$this -> id."'";
    }
}