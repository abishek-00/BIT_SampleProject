<?php

class CommonDao{
    public static function getResult($query){
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $database = "earth1";
    
        //create connection
        $dbconn = new mysqli($servername,$username,$password,$database);
        
        //check connection
        if(!$dbconn){
            die("Connection Failed");
        }

        $result = $dbconn->query($query);
        return $result;
    }
}
    
   



