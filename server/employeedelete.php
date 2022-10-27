<?php
include_once('employeedao.php');

//    $errors = "";
//
//    if (!isset($_POST["employee"])) {
//        $errors = "Employee Not Available";
//    }else{
//        $employee = json_decode($_POST["employee"]);
//        $result = EmployeeDao::deleteEmployee($employee);
//        if ($result != 1) {
//            echo("DB Error");
//        }
//
//    }

    // if($errors != ""){
    //     echo($errors);
    // }else{
    //     if (EmployeeDao::getByNic($employee->nic) != null) {
    //         echo ("This NIC already Exists");
    //     }else{
    //         $result = EmployeeDao::insertEmployee($employee);
    //         if ($result != 1) {
    //             echo("DB Error");
    //         }
    //     }
    // }

// $hasName = !empty($_GET['name']);
// $hasGender = !empty($_GET['gender']);

// if($hasName){
//     $name = $_GET['name'];
// }
// if($hasGender){
//     $gender = $_GET['gender'];
// }
// $employee = array();
// if(!$hasName && !$hasGender) $employee = EmployeeDao::getAll();
// if($hasName && !$hasGender) $employee = EmployeeDao::getByName($name);
// if(!$hasName && $hasGender) $employee = EmployeeDao::getByGender($gender);
// if($hasName && $hasGender) $employee = EmployeeDao::getByNameAndGender($name,$gender);

// echo(json_encode($employee));