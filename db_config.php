<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "root";
 $db = "Gym";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

 if(mysqli_connect_errno())
 die('Failed to connect to DB' . mysqli_connect_error());

 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

?>