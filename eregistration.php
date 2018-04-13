<?php
include"includes\onlyforlogin.php";
$name=$_POST['full_name'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$role=$_POST['employee_role'];
$contactno=$_POST['primary_phone'];
$phone=$_POST['sphone'];
$username=$_POST['username'];
$email=$_POST['email_address'];
$password=$_POST['password'];
$jdate=$_POST['joining_date'];
$post=$_POST['post'];
$addInfo=$_POST['addInfo'];
$pname=$_FILES["profile_pic"]["name"];
$type=$_FILES["profile_pic"]["type"];
$size=$_FILES["profile_pic"]["size"];
$temp=$_FILES["profile_pic"]["tmp_name"];
$error=$_FILES["profile_pic"]["error"];
if($error>0){
die("error uploading file ");}
else
{
  move_uploaded_file($temp, "uploads/".$name);
  $file=basename( $_FILES["profile_pic"]["name"],".jpg");
}
$cname=$_FILES["cv"]["name"];
$type=$_FILES["cv"]["type"];
$size=$_FILES["cv"]["size"];
$temp=$_FILES["cv"]["tmp_name"];
$error=$_FILES["cv"]["error"];
if($error>0){
die("error uploading file ");}
else
{
  move_uploaded_file($temp, "uploads/".$name);
  $file=basename( $_FILES["cv"]["name"],".pdf");
}


$conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else{
  
  $sql="INSERT INTO `employee` ( name,gender,address,employee_role,primary_phone,secondary_phone,username,email,password,joining_date,assigned_post,photo,cv,info) 
  VALUES ('$name','$gender','$address','$role','$contactno','$phone','$username','$email','$password','$jdate','$post','$pname','$cname','$addInfo')";

 

  if ($conn->query($sql) === TRUE) 
  {
  	
   header( 'Location: http://localhost/hrmanager/employeeregister.php');
    //header( 'Location: http://localhost/project/' ) ;
       } else 
       {
    echo "Error: " . $sql . "<br>" . $conn->error;
        }

$conn->close();
}