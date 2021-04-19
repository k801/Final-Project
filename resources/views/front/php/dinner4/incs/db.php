<?php
//    dbname,username,password,server

//    1- db connection
//    mysql -u root -p 
//    mysql> use dbname

$server="localhost";
$user="root";
$pass="";
$dbname="restaurant";

$conn=mysqli_connect($server,$user,$pass,$dbname);

if(!$conn)
{
    die( "connection failed".mysqli_connect_error());
   
}



 
 // mysqli_close($conn);


?>