<?php
@session_start();
@session_destroy(); 
header("Location:http://localhost/hrmanager/login.php");
        exit();
        ?>

