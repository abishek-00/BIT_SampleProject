<?php
class Employee{
    
    public $id;
    public $name;
    public $age;
    public $nic;
    public $gender;

    public function __construct()
    {
        
    }
    function getId(){
        return $this->id;
    }
    function setId($id){
        return $this->id = $id;
    }
    function getName(){
        return $this->name;
    }
    function setName($name){
        return $this->name = $name;
    }
    function getAge(){
        return $this->age;
    }
    function setAge($age){
        return $this->age = $age;
    }
    function getNic(){
        return $this->nic;
    }
    function setNic($nic){
        return $this->nic = $nic;
    }
    function getGender(){
        return $this->gender;
    }
    function setGender($gender){
        return $this->gender = $gender;
    }
    
}