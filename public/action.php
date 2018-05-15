<?php include 'connection.php';?>

<?php 

		if(isset($_POST['submit']))
			{	
				
				$msg = "";
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


							}else{ /* Invalid Character--> */ $msg .= "Only name Allowed <br>";}
				
						}else{ /* Invalid Length--> */ $msg  .=" Name Must Be Between 2 to 30 chars long <br>";}
					}else{ /* Blank Input */ $msg .= "Name Can't be blank !! <br>";}



				//User Name
					if(!empty($user)){
						if (strlen($user) > 2 && strlen($user) < 30) {
							if(!preg_match('/[^a-zA-Z\s]/', $user)) {

								//All Test Passed..!! 
								$user_valid = true; 
								echo "Username is OK <br>";


							}else{ /* Invalid Character--> */ $msg .= "Username Can Conatin Alphabet,digit,uderscore '()' and period '.' symbols <br>";}
				
						}else{ /* Invalid Length--> */ $msg .= " Username must between 2 to 20 char long. <br>";}
					}else{ /* Blank Input */ $msg .= "Username Can't be blank !! <br>";}

				
				//mail check
					if(!empty($mail)){
						if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
								//echo $mail;die;


								//All Test Passsed
								$mail_valid = true;
								echo "Email Is Okay. <br>";
						}else{/* Invalid Email  */ $msg .= $mail."is an Invalid Email Address. <br>";}

					}else{ /* Blank Input */$msg .= "Email Can't Be Blank. <br>";}	




				//Check Password

					if(!empty($password)){
						if(strlen($password) > 4 && strlen($password) < 20){
							//All Test Passed!!
							$password_valid = true;
							$password = md5($password);
							echo "Password Is Okay !! <br>";

						}else {/* Invalid length -->   */ $msg .= " Password Must be Between 5 to 15 chars <br>";};
					}else {/*Blank Input--> */ $msg .= "Password Can't must be blank !! <br>";}	
 

 				//Check Mobile
					if(!empty($mobile)){
						if(strlen($mobile) >= 11 && strlen($mobile) <= 13){
							//All Test Passed!!
							$mobile_valid =true;
							echo " Mobile Number Is Okay!! <br>";
						}else{ /*Invalid Length --> */$msg .= "Mobile Number Must be Between 11 to 13 chars <br>";}
					}else{/* Blank Input --> */ $msg .= "Mobile Can't must be blank !! <br>";}


				//Check Phone
					if(!empty($phone)){
						if(strlen($phone) >= 11 && strlen($phone) <=13){
							//All Test Passed!!
							$phone_valid =true;
							echo " Phone Number Is Okay!! <br>";
						}else{ /*Invalid Length --> */ $msg .= "Phone Number Must be Between 9 to 11 chars <br>";}
					}else{/* Blank Input --> */ $msg .= "Phone Can't must be blank !! <br>";}



				//Check Address
					if(!empty($address)){
							//All Test Passed!!
							$address_valid =true;
							echo " Address Is Okay!! <br>";
					}else{/* Blank Input --> */ $msg .= "Address Can't must be blank !! <br>";
					}

					if ($name_valid && $user_valid && $mail_valid && $password_valid && $mobile_valid && $phone_valid && $address_valid) {				
						$query = "INSERT INTO form (name,user,email,password,mobile,phone,address) VALUES ('$name','$user','$mail','$password','$mobile','$phone','$address')";
						$result	= mysqli_query($db_server,$query) or die("Can't insert data into data into database.".mysqli_error($db_server));
   
							if($result) {
								$msg = "Data Submitted to Database";
								header("Location: ../reg.php?msg=".$msg);
							}

						}else{
							header("Location: ../reg.php?msg=".$msg);

						}
		}		
?>