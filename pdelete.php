<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
	$sql = "DELETE FROM `project` WHERE `id`='$id'";

if ($conn->query($sql) === TRUE)
 {
  header( 'Location: http://localhost/hrmanager/pview.php');
   } 
else 
  {
    echo "Error deleting record: " . $conn->error;
   }
$conn->close();
    }
?>