<?php
@session_start();
  if(isset($_SESSION['id']))
  {
    die('you cannot view this page');
  }
  ?>