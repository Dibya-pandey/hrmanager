<?php
@session_start();
  if(isset($_SESSION['id']))
  {
  	}
  	else{
        echo"you cannot view this page";
        die();}
        ?>