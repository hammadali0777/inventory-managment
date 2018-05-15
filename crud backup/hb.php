



<html>
<head>
<title>
Create & View
</title>

</head>
<body>
	
<?php
include 'connection.php';
// echo '<pre>'; print_r($db_server);
if(isset($_POST['submit']))
{
	
			 echo $name=$_POST["name"];
			 echo $lastname=$_POST['lastname'];
			 echo $mobile=$_POST['mname'];
			 echo $email=$_POST['mail'];	
			 echo $password=$_POST['password'];
			 $pass_len= strlen($pass);

		if(empty($name))
		{
			$msg ="Please Enter Your Names";
		}
		elseif (empty($lastname)) 
		{
			$msg ="Please Enter Your Last Name";
		}
		elseif(empty($mobile))
		{
			$msg ="Please Enter Your Mobile";
		}
		elseif(empty($email))
		{
			$msg ="Please Enter Your Email";
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$msg ="Please Enter Valid Email Address";
		}
		elseif(empty($password))
		{
			$msg="Please Enter Your Password";
		}
		elseif($password_len<=6)
		{	
			$msg="Password Should be more than 6 characters long";
		}
}

			$query="insert into post(name,lname,mobile,password,email) values ('$name','$lastname','$mobile','$password','$email')";
			

			$result= mysqli_query($db_server,$query); 



	?>

	<center>
	<form action="" method="post">
		Name<br>
		<input type="text" name="name" placeholder="Name" required>
		<br>
		Last Name<br>
		<input type="text" name="lastname" placeholder="Last Name"  >
		<br>
		Mobile No<br>
		<input type="text" name="mname" placeholder="Mobile No:"  >
		<br>
		Email<br>
		<input type="text" name="mail" placeholder="Email"  >
		<br>
		Password<br>
		<input type="password" name="password" placeholder="Password" >
		<br> <br>
		<input  type="submit" 	name="submit" value="Submit">
		<p style="color:red;">
			<?php
				if(isset($msg))
				{
					echo $msg;
					
				}
				?>
		</p>
	</form>
		
	</center>

</body>
</html>
