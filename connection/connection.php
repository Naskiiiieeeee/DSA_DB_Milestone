<?php

function connection(){
    
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'student_portal_demo';

    $con = new mysqli($host,$username,$password,$dbname);

    if($con->errno){
        echo $con->errno;
    }else{
        return $con;
    }
}