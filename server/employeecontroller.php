<?php
include_once('employeedao.php');

class EmployeeController{
    public static function get(){
        $hasName = !empty($_GET['name']);
        $hasGender = !empty($_GET['gender']);

        if($hasName){
           $name = $_GET['name'];
        }
        if($hasGender){
           $gender = $_GET['gender'];
        }
        $employee = array();
        if(!$hasName && !$hasGender) $employee = EmployeeDao::getAll();
        if($hasName && !$hasGender) $employee = EmployeeDao::getByName($name);
        if(!$hasName && $hasGender) $employee = EmployeeDao::getByGender($gender);
        if($hasName && $hasGender) $employee = EmployeeDao::getByNameAndGender($name,$gender);

        echo(json_encode($employee));
    }
    public static function post($employee){

        $errors = "";

        if ($employee == null){
            $errors = "Employee Not Available";
        }else{

            if (!(isset($employee->name))&&(isset($employee->age))&&(isset($employee->nic))&&(isset($employee->gender))) {
                $errors = "Employee data missing";
            }else{
                if(!preg_match("/^[A-Z][a-z]{2,}/",$employee->name))$errors = $errors."Name Invalid ";
                if(!preg_match("/^([1-1][8-9]|[2-4][0-9]|50)$/",$employee->age))$errors = $errors."Age Invalid ";
                if(!preg_match("/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/",$employee->nic))$errors = $errors."NIC Invalid ";
                if($employee->gender == null) $errors = $errors."Gender Not Selected";
            }
        }

        if($errors != ""){
            echo($errors);
        }else{
            if (EmployeeDao::getByNic($employee->nic) != null) {
                echo ("This NIC already Exists");
            }else{
                $result = EmployeeDao::insertEmployee($employee);
                if ($result != 1) {
                    echo("DB Error");
                }
            }
        }
    }
    public static function put($id,$employee){
        $errors = "";

        if ($employee == null){
            $errors = "Employee Not Available";
        }else{

            if (!(isset($employee->name))&&(isset($employee->age))&&(isset($employee->nic))&&(isset($employee->gender))) {
                $errors = "Employee data missing";
            }else{
                if(!preg_match("/^[A-Z][a-z]{2,}/",$employee->name))$errors = $errors."Name Invalid ";
                if(!preg_match("/^([1-1][8-9]|[2-4][0-9]|50)$/",$employee->age))$errors = $errors."Age Invalid ";
                if(!preg_match("/^([0-9]{9}[x|X|v|V]|[0-9]{12})$/",$employee->nic))$errors = $errors."NIC Invalid ";
                if($employee->gender == null) $errors = $errors."Gender Not Selected";
            }
        }

        if($errors != ""){
            echo($errors);
        }else{

            if (!(EmployeeDao::getById($id))){
                echo "Employee not found in DB";
            }else{
                $emp = EmployeeDao::getByNic($employee->nic);

                if ($emp != null && $emp->id != $id) {
                    echo ("This NIC already Exists");
                }else{
                    $employee->id = $id;
                    $result = EmployeeDao::updateEmployee($employee);
                    if ($result != 1) {
                        echo("DB Error");
                    }
                }
            }


        }


    }
    public static function delete($id){
        $errors = "";

        if (!(EmployeeDao::getById($id))){
            echo "Employee Not Available";
        }else{

            $result = EmployeeDao::deleteEmployee(EmployeeDao::getById($id));
            if ($result != 1) {
                echo("DB Error");
            }

        }
    }
   
}
