<?php
$status=$_POST['project_status'];
 $conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
	  $sql="INSERT INTO `project_status` (status) 
	  VALUES('$status')";

	   if ($conn->query($sql) === TRUE) 
			  {
			    header( 'Location: http://localhost/hrmanager/project_status.php' ) ;
			 } else 
	       {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	        }
	$conn->close();	 
}