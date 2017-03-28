<?php
     error_reporting(0);
    ini_set('max_execution_time', 0); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "request_inventory";

    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
?>