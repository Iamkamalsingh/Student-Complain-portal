<?php 
$host = "localhost";
$user = "root";
$db_password = "";
$db_name = "complainbox";

$conn= mysqli_connect($host,$user,$db_password,$db_name);
if($conn){
    //echo "Connected";
}
else{
    echo"not connected";
}



?>