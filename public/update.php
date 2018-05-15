<?php include 'connection.php'; ?>
<html>
	<head>
		<title>
			View Form 
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


	 <!-- Delete Query -->
		<?php
			session_start();
			//echo $_SESSION["user"];die;

			if (isset($_GET['del'])) {
				$id = $_GET['del'];
				$query = "DELETE FROM form WHERE id= $id";
				$result = mysqli_query($db_server,$query) or die("Can't Delete the data from Database.".mysqli_error($db_server));

				if ($result) 
					echo "Data Deleted From Database";
			}
			?>
	<div class="container-fluid">
	<!-- Top Row Start -->
		<div class="row">
			<div class="top">
				<div class="col-md-3">
					<div class="top-left-txt">
					View <br> Form
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
							<a href="logout.php" class="form-txt">Logout</a>
					</div>
					</center>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-col-right">
					<!-- Form Div  -->
					<center>
						<div class="form">
							<br>
						<!-- View Query -->
							<h1> View </h1>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Phone</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
    	<?php
		$userName = $_SESSION["user"];

		if( $_SESSION["user"]==true){

			$query="SELECT * FROM form WHERE user = '$userName' ";
		$result= mysqli_query($db_server,$query) or die("Can't fetch data form database".mysqli_error($db_server));
		// if($result) echo "we go the data from database";
		if(mysqli_num_rows($result)>0){

			while($user = mysqli_fetch_assoc($result)) {?>
			<tr>
				<td><?php echo $user['name']; ?> </td>
				<td><?php echo $user['user']; ?> </td>
				<td><?php echo $user['email']; ?> </td>
				<td><?php echo $user['mobile']; ?> </td>
				<td><?php echo $user['phone']; ?> </td>
				<td><?php echo $user['address']; ?> </td>
				<td>
					<a href="<?php $_SERVER['PHP_SELF']?> ?del=<?php echo $user['id'] ?>"
						class="btn btn-danger"> Delete</a>
				</td>
				<td>
					<a href="updateform.php?upd=<?php echo $user['id']?>"
						class="btn btn-warning"> Update </a>
				</td>
			</tr>
			<?php
			}	
		}

		} else {
			echo "I am logged Out";
			header('location:login.php');
		}

		


?>






</tbody>
</table>

</body>
</html>

