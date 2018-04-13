<?php
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$contact=$_POST['phone'];
$role=$_POST['role'];
$dept=$_POST['dept'];
$conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
  
	  echo"connected successfully";
	   $sql="INSERT INTO `register` (name,username,password,contact,department,role) 
	  VALUES('$name','$email','$pass','$contact','$role','$dept')";

	   if ($conn->query($sql) === TRUE) 
			  {
			    echo"data inserted";
			 } else 
	       {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	        }
	$conn->close();	 
}