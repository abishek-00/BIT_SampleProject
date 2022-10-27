<?php
    include_once('genderdao.php');
    
    echo("TESTING........!!!");
    echo("</br></br>");

    $gender = GenderDao::getById(1);
    echo(json_encode($gender));
    echo("</br></br>");

    $genders = GenderDao::getAll();
    echo(json_encode($genders));
    echo("</br></br>");

    include_once('employeedao.php');
    
    echo("TESTING........!!!");
    echo("</br></br>");

    $employee = EmployeeDao::getById(5);
    echo(json_encode($employee));
    echo("</br></br>");

    $employees = EmployeeDao::getAll();
    echo(json_encode($employees));
    echo("</br></br>");


  
