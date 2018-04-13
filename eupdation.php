<?php
include"includes\onlyforlogin.php";
$id=$_POST['id'];
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
else
{
	$sql="UPDATE  `employee` SET `name` = '".$name."', `gender` = '".$gender."',`address` ='".$address."', `employee_role` = '".$role."', `primary_phone` = '".$contactno."',`secondary_phone` ='".$phone."',`username` = '".$username."', `email` = '".$email."',`password` ='".$password."',`joining_date` = '".$jdate."', `assigned_post` = '".$post."',`photo` ='".$pname."',`cv` = '".$cname."', `info` = '".$addinfo."' WHERE `id`=$id";


if ($conn->query($sql) === TRUE) {
   	
   header( 'Location: http://localhost/hrmanager/eview.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>"