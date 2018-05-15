<?php include 'connection.php'; ?>
<!-- <?php 
	if((isset($_POST['submit'])))
	{
		$name= mysqli_real_escape_string($db_server,trim($_POST['name']));
		$user= mysqli_real_escape_string($db_server,trim($_POST['user']));
		$mail= mysqli_real_escape_string($db_server,trim($_POST['mail']));
		$password= mysqli_escape_string($db_server,trim($_POST['password']));
		$name_valid = $user_valid = $mail_valid = $password_valid = false;



//echo $mail; die;
		//Name Check
		if(!empty($name)){
			if (strlen($name) > 2 && strlen($name) < 30) {
				if(!preg_match('/[^a-zA-Z\s]/', $name)) {

					//All Test Passed..!!
					$name_valid = true; 
					echo "Name is OK <br>";


				}else{ /* Invalid Character--> */ echo "Only name Allowed <br>";}
				
			}else{ /* Invalid Length--> */ echo " Name Must Be Between 2 to 30 chars long <br>";}
		}else{ /* Blank Input */ echo "Name Can't be blank !! <br>";}


		//Check User


		if(!empty($user)){
			if (strlen($user) > 4 && strlen($user) < 20){
				if(!preg_match('/[^a-zA-Z\s]/', $user)){


					// All Test Passed !!
					$user_valid = true;
					echo "Username is Okay !! <br>";

				}else{/*Invalid Characters --> */ echo "Username Can Conatin Alphabet,digit,uderscore '()' and period '.' symbols <br>";}
			}else{ /* Invalid length -->  */ echo "Username must between 2 to 20 char long. <br>"; }
	}else{/* Blank Input */ echo "Username Can't be blank !! <br> ";}

		//mail check
		if(!empty($mail)){
			if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
				//echo $mail;die;


				//All Test Passsed
				$mail_valid = true;
				echo "Email Is Okay. <br>";
			}else{/* Invalid Email  */ echo $mail."is an Invalid Email Address. <br>";}

		}else{ /* Blank Input */ echo "Email Can't Be Blank. <br>";}

		//Check Password

		if(!empty($password)){
			if(strlen($password) > 4 && strlen($password) < 20){
				//All Test Passed!!
				$password_valid = true;
				$password = md5($password);
				echo "Password Is Okay !! <br>";

			}else {/* Invalid length -->   */ echo " Password Must be Between 5 to 15 chars <br>";};
		}else {/*Blank Input--> */  echo "Password Can't must be blank !! <br>";}


		if($name_valid && $user_valid && $mail_valid && $password_valid) {

			$query = "INSERT INTO user (name,user,email,password) VALUES ('$name','$user','$mail','$password')";
		  		//$result= mysqli_query($db_server,$query);

				$result	= mysqli_query($db_server,$query) or die("Can't insert data into data into database.".mysqli_error($db_server));
				if($result) echo "Data Submitted to Database";	



		}




	}
?> -->

	<!-- Delete Data -->
		<?php
			if (isset($_GET['del'])) {
				$id = $_GET['del'];
				$query = "DELETE FROM user WHERE id= $id";
				$result = mysqli_query($db_server,$query) or die("Can't Delete the data from Database.".mysqli_error($db_server));

				if ($result) 
					echo "Data Deleted From Database";
			}
			?>



<html>
	<head>
		<title>
			CRUD
		</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="container">
	<center>
	<h1> CRUD Operation</h1>
	<br>
	<?php
	if(isset($_GET['msg'])) echo $_GET['msg'];
	?>
	<form method="post" action="action.php">
		Full Name:<br>
  			<input type="text" name="name" placeholder="Full Name">
  			<br>
  		User Name:<br>
  			<input type="text" name="user" placeholder="User Name" >
  			<br>
  		Email:<br>
  			<input type="text" name="mail" placeholder="Email" >
  			<br>
  		Password:<br>
  			<input type="password" name="password" placeholder="Password">
  			<br>
  			<br>
  			<input type="submit" value="submit" name="submit">

	</form>
	<br>
	<h1> User Data </h1>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
	<?php 

		$query="SELECT * FROM user";
		$result= mysqli_query($db_server,$query) or die("Can't fetch data form database".mysqli_error($db_server));
		//if($result) echo "we go the data from database";
		if (mysqli_num_rows($result)>0) {

		 while($users=mysqli_fetch_assoc($result))
		 {?>
		 		<tr>
		 			<td><?php echo $users['name']?> </td>
		 			<td><?php echo $users['user']?> </td>
		 			<td><?php echo $users['email']?> </td>
		 			<td>
		 				<a href="<?php $_SERVER['PHP_SELF']?> ?del=<?php echo $users['id'] ?>"
		 					class="btn btn-danger"> Delete</a>
		 			</td>
		 			<td>
		 				<a href="update.php?upd=<?php echo $users['id']?>" class="btn btn-warning"> Update</a>
		 			</td>
		 		</tr>
		 	<?php
		 }
		 		
		 }
		 else{ ?>

		 		<tr>
		 			<td colspan="3" class="text-center">
		 				<h2 class="text-muted"> There Is No Data To Show !! </h2>
		 			</td>
		 		</tr>
		 	<?php 
		 		}
		 		?>

	</tbody>
	</table>

	</center>
</div>
</body>
</html>