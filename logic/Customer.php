<?php
require "persistence/CustomerDAO.php";

class Customer{
    private $id;
    private $name;
    private $lastname;
    private $city;
    private $mail;
    private $password;    
    private $connection;
    private $customerDAO;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getCity() {
        return $this->city;
    }

    function getMail() {
        return $this->mail;
    }

    function getPassword() {
        return $this->password;
    }
    
    function getCustomerDAO() {
        return $this->customerDAO;
    }

        
    function Customer ($pId="", $pName="", $pLastname="", $pCity="", $pMail="", $pPassword="") {
        $this -> id = $pId;
        $this -> name = $pName;
        $this -> lastname = $pLastname;
        $this -> city = $pCity;
        $this -> mail = $pMail;
        $this -> password = $pPassword;          
        $this -> connection = new Connection();
        $this -> customerDAO = new CustomerDAO($pId, $pName, $pLastname, $pCity, $pMail, $pPassword);
    }
    
    function create(){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> create());
        $this -> connection -> close();
    }
    
    function authenticate () {
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> authenticate());
        $this -> connection -> close();
        if($this -> connection -> numRows() == 1){
            $this -> id = $this -> connection -> extract()[0];
            return true;
        }else{
            return false;
        }
    }
    
    function consult_exists($id){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> consult_exists($id));
        $this -> connection -> close();
        $resultado = $this -> connection -> extract();
        return $resultado[0];
    }
    
    function consult(){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> consult());
        $this -> connection -> close();
        $result = $this -> connection -> extract();
        $this -> name = $result[0];
        $this -> lastname = $result[1];
        $this -> city = $result[2];
        $this -> mail = $result[3]; 
        $this -> password = $result[4];
    }
    
    function consultMail($mail){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> consultMail($mail));
        $this -> connection -> close();
        $result = $this -> connection -> extract();
        return $result[0];
    }
        
    function consultName($mail){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> consultName($mail));
        $this -> connection -> close();
        $result = $this -> connection -> extract();
        return $result[0];
    }
    
    function consultLastName($mail){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> consultLastName($mail));
        $this -> connection -> close();
        $result = $this -> connection -> extract();
        return $result[0];
    }
    
    function edit(){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> edit());
        $this -> connection -> close();
    }
    
    function editPassword($password,$mail){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> editPassword($password,$mail));
        $this -> connection -> close();
    }
    
    function deleteAccount(){
        $this -> connection -> open();
        $this -> connection -> execute($this -> customerDAO -> deleteAccount());
        $this -> connection -> close();
    }
}