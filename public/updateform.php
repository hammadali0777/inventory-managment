
<?php include 'connection.php';?>
<?php
if(isset($_GET['upd']))
	{
		$id = $_GET['upd'];
		$query= "SELECT * FROM form WHERE id=$id";
		$result = mysqli_query($db_server,$query) or die("cant fetch the data.".mysqli_error($db_server));
		$user = mysqli_fetch_assoc($result);	
		
	}

	?>

	<!-- Update Data -->
		<?php
		if(isset($_POST['update']))
		{
		$name=$_POST['name'];
		$user=$_POST['user'];
		$mail=$_POST['mail'];
		$password= md5($_POST['password']);
		$mobile=$_POST['mobile'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];


	    $query = "UPDATE form SET name = '$name' , user = '$user', email = '$mail', password = '$password', mobile = '$mobile', phone = $phone, address = '$address' WHERE id = $id";
		$result	=	mysqli_query($db_server,$query) or die( "Can't Upadte the Data.".$mysqli_error($db_server));
		if($result){
			header("Location:update.php");
		}
		

	}
	?>
<html>
	<head>
		<title>
			Update Form 
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
	<div class="container-fluid">
	<!-- Top Row Start -->
		<div class="row">
			<div class="top">
				<div class="col-md-3">
					<div class="top-left-txt">
					Update <br> Form
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
							<div class="right-text">
								<?php 
								if (isset($_GET['msg'])) echo $_GET['msg']; 
								?>
							</div>
							<br>
							<form action="" method="POST">
								<div class="form-group">
      								<label for="name" class="form-txt">Full Name</label>
    								<input value="<?php echo $user['name'] ?>" type="name" class="form-control" id="name" name="name" placeholder="Full Name">
    							</div>
    							<div class="form-group">
      								<label for="user-name" class="form-txt">User Name</label>
    								<input value="<?php echo $user['user'] ?>" type="user-name" class="form-control" name="user" id="user-name" placeholder="User Name">
    							</div>
    							<div class="form-group">
      								<label for="email" class="form-txt">Email</label>
    								<input value="<?php echo $user['email'] ?>" type="email" class="form-control" name="mail" id="email" placeholder="Email">
    							</div>
    							<div class="form-group">
      								<label for="password" class="form-txt"> New Password </label>
    								<input value="" type="password" class="form-control" name="password" id="password" placeholder="New Password">
    							</div>
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<input value="<?php echo $user['mobile'] ?>" type="mobile" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<input value="<?php echo $user['phone'] ?>" type="phone" class="form-control" name="phone" id="phone" placeholder="Phone No">
    									</div>
    								</div>

    							</div>
    							<div class="form-group">
      								<label for="address" class="form-txt">Address</label>
    								<input value="<?php echo $user['address'] ?>" type="Address" class="form-control" id="address" name="address" placeholder="Address">
    							</div>
    							<div class="frm-btn">
    									<button type="submit" class="btn btn-primary" id="update" value="Submit" name="update">Update</button>
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

