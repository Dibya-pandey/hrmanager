<?php
    require_once 'token.php';
    @session_start();
    $username=$_POST['email'];
    $password=$_POST['password'];
    $token=$_POST['token'];
    if (!empty($username)&& !empty($password))
    {
      if(Token::check($token))
      {
   if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response'])
   {
        var_dump($_POST);
        $secret = "6LcjoiQUAAAAAOB4L3-PROS7ZQYRencnylrtpkUf";
        $ip = $_SERVER['REMOTE-ADDER'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        var_dump($rsp);
        $arr = json_decode($rsp,TRUE);
        if($arr['success'])
        {
    $conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
  
     /*echo"connected successfully";*/
     $sql =mysqli_query($conn ,"SELECT * FROM `register` where username='$username' AND password='$password'");


      $row = mysqli_fetch_assoc($sql);

     if ($row) 
     {
  	   @session_start();
       $_SESSION['id'] = $row['id'];
       header( 'Location: http://localhost/hrmanager/dashboard.php' ) ;
      }
      else
      {
        $tt=date("Y-m-d H:i:s");
        //if failed
        //check if username in database
        //if usernname present then update
        //else insert new
        $sequel=mysqli_query($conn ,"SELECT * FROM `loginerror` where username='$username'");
        $rows=mysqli_fetch_assoc($sequel);
        if($tt < $rows['lock_time'])
        {
          die('you are locked');
        }
       else
        {
            if($rows['username']==$username)
          {
            $id=$rows['id'];
            $fl=$rows['failed_login_count'];
            if($fl==3)
           {
             $sql = "DELETE FROM `loginerror` WHERE `id`='$id'";
             if ($conn->query($sql)===TRUE)  
             {
              $query ="INSERT INTO `loginerror` (username,login_time,failed_login_count) 
                 VALUES('$username','$tt','1')";
                 if ($conn->query($query) === TRUE) 
                 {
                   header( 'Location: http://localhost/hrmanager/login.php' );
                 }
               
              }
            }
             elseif ($fl>=2) 
           {
              $fl++;
              $now = time();
              $ten_minutes = $now + (10 * 60);
              $startDate = date('Y-m-d H:i:s', $now);
              $endDate = date('Y-m-d H:i:s', $ten_minutes);
              $queri= "UPDATE  `loginerror` SET `lock_time`='".$endDate."' , `failed_login_count`='".$fl."' WHERE `id`=$id";
                  if ($conn->query($queri)===TRUE) 
                 {
                    header( 'Location: http://localhost/hrmanager/login.php' );
                  }
           }
        
           else
           {
               $fl++;
               $queri= "UPDATE  `loginerror` SET `failed_login_count` = '".$fl."' ,`login_time`= '".$tt."' WHERE `id`=$id";
               if($conn->query($queri)===TRUE)
             {        
               header( 'Location: http://localhost/hrmanager/login.php' );
             }
            }
          }
        else
        {
            $query ="INSERT INTO `loginerror` (username,login_time,failed_login_count) 
                 VALUES('$username','$tt','1')";
           if ($conn->query($query) === TRUE)
           {
            header( 'Location: http://localhost/hrmanager/login.php');
            }  
            else
            {
              echo"error";
            }         

        } 
        }
     }


        $conn->close();
      }
    }
      else{
         echo "spam";
      }
}
}
}
