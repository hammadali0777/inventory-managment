<?php include 'connection.php'; ?>
<?php 
	if(isset($_GET['upd']))
	{
		$id = $_GET['upd'];
		$query= "SELECT * FROM user WHERE id=$id";
		$result = mysqli_query($db_server,$query) or die("cant fetch the data.".mysqli_error($db_server));
		$users = mysqli_fetch_assoc($result);
		
	}

	?>
	<!-- Update Data -->
		<?php
		if(isset($_POST['btn-update']))
		{
		$name=$_POST['name'];
		$user=$_POST['user'];
		$mail=$_POST['mail'];
		$password= md5($_POST['password']);


		$query = "UPDATE user SET name = '$name' , user = '$user', email = '$mail', password = '$password' WHERE id = $id";
		$result	=	mysqli_query($db_server,$query) or die( "Can't Upadte the Data.".$mysqli_error($db_server));


		header("Location:crud.php");

	}
	?>
<html>
	<head>
		<title>
			Update Date
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
	<h1> Update Data</h1>
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>">
		Full Name:<br>
  			<input value="<?php echo $users['name'] ?>" type="text" name="name" placeholder="Full Name">
  			<br>
  		User Name:<br>
  			<input value="<?php echo $users['user'] ?>" type="text" name="user" placeholder="User Name">
  			<br>
  		Email:<br>
  			<input value="<?php echo $users['email'] ?>" type="text" name="mail" placeholder="Email">
  			<br>
  		Password New:<br>
  			<input type="password" name="password" placeholder="New Password">
  			<br>
  			<br>
  			<input type="submit" value="Update" name="btn-update">

	</form>

	</center>
</div>
</body>
</html>