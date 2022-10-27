<?php
include_once('db.php');
include_once('employee.php');
include_once('genderdao.php');

class EmployeeDao{
   static function setData($row){
      $employee = new Employee();


      $employee->setId($row['id']);
      $employee->setName($row['name']);
      $employee->setAge($row['age']);
      $employee->setNic($row['nic']);

      //eager loading
      $gender = GenderDao::getById($row['gender_id']);
      $employee->setGender($gender);

      return $employee;
   }

   static function getById($id){
      $employee = null;

      $sql = "SELECT * FROM employee WHERE ID = $id ";
      $result = CommonDao::getResult($sql);
      
      if($row = $result->fetch_assoc()){
         $employee =  self::setData($row);
      }
      //self means this class
      return  $employee;
   }

   static function getAll(){
      $employees = array();
      $sql = "SELECT * FROM employee ";
      $result = CommonDao::getResult($sql);

      while ($row = $result->fetch_assoc()) {
         $employee = self::setData($row);
         
         array_push($employees,$employee);
      }
      return $employees;
   }

   public static function getByName($name){
      $employees = array();
      $sql = "SELECT * FROM employee WHERE   name LIKE '$name%'";
      $result = CommonDao::getResult($sql);

      while ($row = $result->fetch_assoc()) {
         $employee = self::setData($row);
         
         array_push($employees,$employee);

      }
      return $employees;

   }

   public static function getByGender($gender){
      $employees = array();
      $sql = "SELECT * FROM employee WHERE gender_id = $gender ";
      $result = CommonDao::getResult($sql);

      while ($row = $result->fetch_assoc()) {
         

         $employee = self::setData($row);
         
         array_push($employees,$employee);
      }
      return $employees;
      
   }

   public static function getByNameAndGender($name,$gender){
      $employees = array();
      $sql = "SELECT * FROM employee WHERE   name LIKE '$name%' AND gender_id = $gender ";
      $result = CommonDao::getResult($sql);

      while ($row = $result->fetch_assoc()) {
         $employee = self::setData($row);
         
         array_push($employees,$employee);
      }
      return $employees;
   }

   static function getByNic($nic){
   $employee = null;
   $sql = "SELECT * FROM employee WHERE nic = '$nic' ";
   $result = CommonDao::getResult($sql);
   $row = $result->fetch_assoc();
      if ($row = $result->fetch_assoc()) {
         $employee = self::setData($row);
      }
      return $employee;
   }

   static function insertEmployee($employee){
      $sql= "INSERT INTO employee (name,age,nic,gender_id) VALUES('".$employee->name."',".$employee->age.",'".$employee->nic."',".$employee->gender->id.")";
      return CommonDao::getResult($sql);
      
   }
   static function updateEmployee($employee){
      $sql= "UPDATE employee SET name='".$employee->name."', age=".$employee->age.", nic='".$employee->nic."', gender_id=".$employee->gender->id." WHERE id = ".$employee->id;
      return CommonDao::getResult($sql);
      
   }
   

   static function deleteEmployee($employee){
      if (self::getById($employee->id)==null) {
         return "Employee Not Found";
    
      } else {
         $sql = "DELETE FROM employee WHERE id = ".$employee->id;
         return CommonDao::getResult($sql);
      }
      
   }

}