<?php
    session_start();  
    if(($_SESSION["user"]) == 1) {
        
    }else{
        header("Location: logout.php");
    }
?>