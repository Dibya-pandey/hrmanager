<?php
include"includes\onlyforlogin.php";
$pname=$_POST['project_name'];
$id=$_POST['id'];
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
$status_id=$_POST['project_status'];
$name=$_FILES["project_files"]["name"];
$type=$_FILES["project_files"]["type"];
$size=$_FILES["project_files"]["size"];
$temp=$_FILES["project_files"]["tmp_name"];
$error=$_FILES["project_files"]["error"];
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
  
  $sql="UPDATE  `project` SET `project_name` = '".$pname."', `assigned_employee` = '".$members."', `role` = '".$role."',`address` = '".$address."', `contact_person` = '".$contact."',`position` = '".$position."',`phone_number` = '".$phone."', `email` = '".$email."',`description` ='".$description."',`upload_file` = '".$name."', `file_title` = '".$file_title."',`tags` ='".$tags."',`status_id` = '".$status_id."' WHERE `id`= $id ";

  if ($conn->query($sql) === TRUE) 
  {
    
   header( 'Location: http://localhost/hrmanager/pview.php');
    //header( 'Location: http://localhost/project/' ) ;
       } else 
       {
    echo "Error: " . $sql . "<br>" . $conn->error;
        }

$conn->close();
}