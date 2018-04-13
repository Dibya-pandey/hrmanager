<?php
/*

	{"status" : "error/success" , "message" : "succesfully created, sucessfully deleted,/ ", 'data' : []}

*/


$variable=$_SERVER['REQUEST_METHOD'];
if($variable == 'GET')
{
	$id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","","api");
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else
	{
			
			
			$sql="SELECT * FROM form WHERE `id`=$id";
			$result=mysqli_query($conn,$sql);
			if ($result && mysqli_num_rows($result) > 0)
			{
				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
		       {
			    	$response = ["status" => "success", 'message' => '', 'data' => ['name' => $row['name'], 'address' => $row['address']]];
			    	echo json_encode($response);
			    	die();
	           }
			}
		else
		{
			$response=["status"=> "Failure",'message'=>"Id you have provided is not available",'data'=>[]];
			echo json_encode($response);
			die();
		}

		
	}

	
	
		$conn->close();	 
}
  elseif ($variable=='POST')
 {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$contact=$_POST['phone'];
	$address=$_POST['address'];

			$conn=mysqli_connect("localhost","root","","api");

			if (mysqli_connect_errno())
			{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			 else
		{
  
			  echo"connected successfully";
			   $sql="INSERT INTO `form` (name,email,password,contact,address) 
			  VALUES('$name','$email','$pass','$contact','$address')";

			   if ($conn->query($sql) === TRUE) 
			  {
			    $response = ["status" => "success", 'message' => 'Data inserted', 'data' =>[]];
			    	echo json_encode($response);
			 } 
			 else 
	       {
	           echo "Error: " . $sql . "<br>" . $conn->error;
	        }
  }
	
	$conn->close();	 
	}

	
  elseif ($variable=='DELETE') 
	 { 
	  $id=$_GET['id'];
	  $conn=mysqli_connect("localhost","root","","api");

		if (mysqli_connect_errno())
		{
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else
		{
			$sql = "DELETE FROM `form` WHERE `id`=$id";
			
		if ($conn->query($sql) === TRUE)
		 {
		 $response = ["status" => "success", 'message' => 'Data deleted success', 'data' => []];
			    	echo json_encode($response);
			    	die();
		   } 
		else 
		  {
		    echo "Error deleting record: " . $conn->error;
		   }
		
		}
		
		$conn->close();
		    }
		
			
 elseif ($variable=='VIEW') 
 {
   
$conn=mysqli_connect("localhost","root","","api");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
  $qry="SELECT * FROM form";
  $result=mysqli_query($conn, $qry);
  $data = [];
  if ($result && mysqli_num_rows($result) > 0)
			{
  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC ))
                     {
                     	
            $response[] = $row;

			    /*	echo json_encode($response);*/
			    	?>
			    	<br>
			    	<?php
                     
                     }

                    
               	$response=["status"=> "success",'message'=>" Data users",'data'=> $response];
               	echo json_encode($response);
                 }
                 else
                 {
                 	$response=["status"=> "	Failure",'message'=>"Id you have provided is not available",'data'=>[]];
			echo json_encode($response);
			die();
                 }



$conn->close();
 }
}

?>