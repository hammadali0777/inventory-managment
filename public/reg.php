
<?php include 'connection.php';?>

<html>
	<head>
		<title>
			Registeration Form 
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
	


	<!-- <?php 

		if(isset($_POST['submit']))
			{
				$name= mysqli_real_escape_string($db_server,trim($_POST['name']));
				$user= mysqli_real_escape_string($db_server,trim($_POST['user']));
			    $mail= mysqli_real_escape_string($db_server,trim($_POST['mail']));
				$password= mysqli_real_escape_string($db_server,trim($_POST['password']));
			  	$mobile= mysqli_real_escape_string($db_server,trim($_POST['mobile']));
			  	$phone= mysqli_real_escape_string($db_server,trim($_POST['phone']));
			  	$address= mysqli_real_escape_string($db_server,trim($_POST['address']));
			 	$name_valid = $user_valid = $mail_valid = $password_valid= $mobile_valid= $phone_valid= $address_valid= false;


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



				//User Name
					if(!empty($user)){
						if (strlen($user) > 2 && strlen($user) < 30) {
							if(!preg_match('/[^a-zA-Z\s]/', $user)) {

								//All Test Passed..!! 
								$user_valid = true; 
								echo "Username is OK <br>";


							}else{ /* Invalid Character--> */ echo "Username Can Conatin Alphabet,digit,uderscore '()' and period '.' symbols <br>";}
				
						}else{ /* Invalid Length--> */ echo " Username must between 2 to 20 char long. <br>";}
					}else{ /* Blank Input */ echo "Username Can't be blank !! <br>";}

				
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
					}else {/*Blank Input--> */ echo "Password Can't must be blank !! <br>";}	
 

 				//Check Mobile
					if(!empty($mobile)){
						if(strlen($mobile) >= 11 && strlen($mobile) <= 13){
							//All Test Passed!!
							$mobile_valid =true;
							echo " Mobile Number Is Okay!! <br>";
						}else{ /*Invalid Length --> */ echo "Mobile Number Must be Between 11 to 13 chars <br>";}
					}else{/* Blank Input --> */ echo "Mobile Can't must be blank !! <br>";}


				//Check Phone
					if(!empty($phone)){
						if(strlen($phone) >= 11 && strlen($phone) <=13){
							//All Test Passed!!
							$phone_valid =true;
							echo " Phone Number Is Okay!! <br>";
						}else{ /*Invalid Length --> */ echo "Phone Number Must be Between 9 to 11 chars <br>";}
					}else{/* Blank Input --> */ echo "Phone Can't must be blank !! <br>";}



				//Check Address
					if(!empty($address)){
							//All Test Passed!!
							$address_valid =true;
							echo " Address Is Okay!! <br>";
					}else{/* Blank Input --> */ echo "Address Can't must be blank !! <br>";}


					if ($name_valid && $user_valid && $mail_valid && $password_valid && $mobile_valid && $phone_valid && $address_valid) {
						echo "$address";
						die;				
						$query = "INSERT INTO form (name,user,email,password,mobile,phone,address) VALUES ('$name','$user','$mail','$password','$mobile','$phone','$address')";
						$result	= mysqli_query($db_server,$query) or die("Can't insert data into data into database.".mysqli_error($db_server));
							
							if ($result) {
								echo "Data Submitted to Database";
							}
					}
		}		
?> -->




	<div class="container-fluid">
	<!-- Top Row Start -->
		<div class="row">
			<div class="top">
				<div class="col-md-3">
					<div class="top-left-txt">
					Register <br> Form
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
							<form action="action.php" method="POST">
								<div class="form-group">
      								<label for="name" class="form-txt">Full Name</label>
    								<input type="name" class="form-control" id="name" name="name" placeholder="Full Name">
    							</div>
    							<div class="form-group">
      								<label for="user-name" class="form-txt">User Name</label>
    								<input type="user-name" class="form-control" name="user" id="user-name" placeholder="User Name">
    							</div>
    							<div class="form-group">
      								<label for="email" class="form-txt">Email</label>
    								<input type="email" class="form-control" name="mail" id="email" placeholder="Email">
    							</div>
    							<div class="form-group">
      								<label for="password" class="form-txt">Password</label>
    								<input type="password" class="form-control" name="password" id="password" placeholder="password">
    							</div>
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<input type="mobile" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone No">
    									</div>
    								</div>

    							</div>
    							<div class="form-group">
      								<label for="address" class="form-txt">Address</label>
    								<input type="Address" class="form-control" id="address" name="address" placeholder="Address">
    							</div>
    							<div class="frm-btn">
    									<button type="submit" class="btn btn-primary" value="Submit" name="submit">Register</button>
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

