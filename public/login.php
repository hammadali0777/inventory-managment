






<html>
	<head>
		<title>
			Login Form 
		</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- CSS File Attached -->
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<?php include 'connection.php';?>

<?php
SESSION_START();

if(isset($_POST['submit']))
{
	;	
	$user=$_POST['user'];
	$password=md5($_POST['password']);
      

    $query="SELECT * FROM form WHERE user='$user' && password ='$password'";


	$result	= mysqli_query($db_server,$query);

	$row = mysqli_num_rows($result);
	if($row > 0){
		$_SESSION["user"] = $user;
		$_SESSION["password"] = $password;
		header('location:update.php');
		
	}else{
		echo "username or password is wrong";
	}


// 	if ($db_server->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $db_server->error;
// }
	// var_dump($result);
	// $db_server->close();

	// $result = mysqli_num_rows($result);
	// echo($rows);
	// if($result > 0 ){
	// 	echo "valid";
	// }else{
	// 	echo "not valid";
	// }

}



?>
	<div class="container-fluid">
	<!-- Top Row Start -->
		<div class="row">
			<div class="top">
				<div class="col-md-3">
					<div class="top-left-txt">
					Login <br> Form
					</div>
					
				</div>
				<div class="col-md-8">
	
				</div>
				
			</div>

		</div>
		<!-- top row end -->

		<!-- black row start -->
		<div class="row">
			<div class="col-md-12" style="background-color: #1B2631;">
				<div class="top-down">

				</div>
				
			</div>			
		</div>
		<!-- black row end -->

		<!-- form row start -->
		<div class="row">
			<div class="col-md-3">
				<div class="form-col-lef">
					<center>
						<div class="left-down">
							<label class="form-txt">Change Password</label>
							<hr>
							<label class="form-txt"> Add Contact</label>
							<hr>
							<label class="form-txt">View Contact</label>
							<hr>
							<label class="form-txt">Transaction</label>
							<hr>
							<label class="form-txt">Search Contact</label>
							<hr>
							<label class="form-txt">Logout</label>
						</div>
					</center>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-col-right">
					<!-- Form Div  -->
					<center>
						<div class="form">
							<!-- <div class="right-text">
								Register Form
							</div> -->
							<br>
							<form action="" method="POST">
    							<div class="form-group">
      								<label for="user-name" class="form-txt">User Name</label>
    								<input type="user-name" class="form-control" id="user-name" name="user" placeholder="User Name">
    							</div>
    							<div class="form-group">
      								<label for="password" class="form-txt">Password</label>
    								<input type="password" class="form-control" id="password" name="password" placeholder="password">
    							</div>
    							<div class="frm-btn">
    									<button type="submit" class="btn btn-primary" value="Submit" name="submit">Login</button>
    							</div>
    						</form>
						</div>
					</center>
					<!-- Form Div End -->

				</div>

				
			</div>




		</div>

		<!-- form row end -->
	</div>










</body>
</html>

