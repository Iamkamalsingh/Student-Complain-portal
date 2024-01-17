<?php
    session_start();
    if(($_SESSION["user"]) == 2) {
        
    }else{
        header("Location: logout.php");
    }
?>