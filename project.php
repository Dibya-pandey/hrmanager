<?php
include"includes\onlyforlogin.php";
$pname=$_POST['project_name'];
$members=$_POST['assignemployee'];
$role=$_POST['role'];
$address=$_POST['project_address'];
$contact=$_POST['contact_person'];
$position=$_POST['position'];
$phone=$_POST['phone_number'];
$email=$_POST['email_address'];
$description=$_POST['project_description'];
$file_title=$_POST['file_title'];
$tags=$_POST['tags'];
$name=$_FILES["project_files"]["name"];
$type=$_FILES["project_files"]["type"];
$size=$_FILES["project_files"]["size"];
$temp=$_FILES["project_files"]["tmp_name"];
$error=$_FILES["project_files"]["error"];
$status_id=$_POST['status_id'];
if($error>0){
die("error uploading file ");}
else
{
  move_uploaded_file($temp, "uploads/".$name);
  $file=basename( $_FILES["project_files"]["name"],".pdf");
}



$conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
  $sql="INSERT INTO `project`(project_name,assigned_employee,role,address,contact_person,position,phone_number,email,description,upload_file,file_title,tags,status_id) 
  VALUES('$pname','$members','$role','$address','$contact','$position','$phone','$email','$description','$name','$file_title','$tags','$status_id')";
 

  if ($conn->query($sql) === TRUE) 
  {
    
   header( 'Location: http://localhost/hrmanager/projectregistration.php');
    //header( 'Location: http://localhost/project/' ) ;
       } else 
       {
    echo "Error: " . $sql . "<br>" . $conn->error;
        }

$conn->close();
}