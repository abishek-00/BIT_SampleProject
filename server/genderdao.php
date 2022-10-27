<?php
include_once('db.php');
include_once('gender.php');

class GenderDao{

    static function setData($row){
        $gender = new Gender();

        $gender->setId($row['id']);
        $gender->setName($row['name']);
       
  
        return $gender;
     
     }

    static function getById($id){
        $gender = null;

         $sql = "SELECT * FROM gender WHERE ID = $id ";
         $result = CommonDao::getResult($sql);
         
         
         if ($row = $result->fetch_assoc()) {
            $gender = self::setData($row);
         }
         
        return $gender;
    }

    static function getAll(){
         $genders = array();
         $sql = "SELECT * FROM gender ";
         $result = CommonDao::getResult($sql);

         while ($row = $result->fetch_assoc()) {
            $gender = self::setData($row);
            
            array_push($genders,$gender);
         }
         return $genders;
    }
}