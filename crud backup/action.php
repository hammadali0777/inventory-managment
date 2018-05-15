<?php include 'connection.php'; ?>
<?php 
	if((isset($_POST['submit'])))
	{
		$msg = "";
		$name= mysqli_real_escape_string($db_server,trim($_POST['name']));
		$user= mysqli_real_escape_string($db_server,trim($_POST['user']));
		$mail= mysqli_real_escape_string($db_server,trim($_POST['mail']));
		$password= mysqli_escape_string($db_server,trim($_POST['password']));
		$name_valid = $user_valid = $mail_valid = $password_valid = false;



//echo $password; die;
		//Name Check
		if(!empty($name)){
			if (strlen($name) > 2 && strlen($name) < 30) {
				if(!preg_match('/[^a-zA-Z\s]/', $name)) {

					//All Test Passed..!!
					$name_valid = true; 
					echo "Name is OK <br>";


				}else{ /* Invalid Character--> */ $msg .= "Only name Allowed <br>";}
				
			}else{ /* Invalid Length--> */ $msg .=" Name Must Be Between 2 to 30 chars long <br>";}
		}else{ /* Blank Input */ $msg .= "Name Can't be blank !! <br>";}


		//Check User


		if(!empty($user)){
			if (strlen($user) > 4 && strlen($user) < 20){
				if(!preg_match('/[^a-zA-Z\s]/', $user)){


					


					$query ="SELECT user FROM user WHERE user = '$user'";
					$result =mysqli_query($db_server,$query) or die("Cant Result query to select User Name". mysqli_query($db_server));
					if(mysqli_num_rows($result)>0){

						$msg .="Username is not available please..!! Another <br>";
					}else{

						// All Test Passed !!
					$user_valid = true;
					echo "Username is Okay !! <br>";

					}

				}else{/*Invalid Characters --> */ $msg .= "Username Can Conatin Alphabet,digit,uderscore '()' and period '.' symbols <br>";}
			}else{ /* Invalid length -->  */ $msg .= "Username must between 2 to 20 char long. <br>"; }
	}else{/* Blank Input */ $msg .="Username Can't be blank !! <br> ";}

		//mail check
		if(!empty($mail)){
			if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
				//echo $mail;die;


				//All Test Passsed
				$mail_valid = true;
				echo "Email Is Okay. <br>";
			}else{/* Invalid Email  */ $msg .= $mail."is an Invalid Email Address. <br>";}

		}else{ /* Blank Input */ $msg .="Email Can't Be Blank. <br>";}

		//Check Password

		if(!empty($password)){
			if(strlen($password) > 4 && strlen($password) < 20){
				//All Test Passed!!
				$password_valid = true;
				$password = md5($password);
				echo "Password Is Okay !! <br>";

			}else {/* Invalid length -->   */ $msg .= " Password Must be Between 5 to 15 chars <br>";};
		}else {/*Blank Input--> */ $msg .="Password Can't must be blank !! <br>";}


		if($name_valid && $user_valid && $mail_valid && $password_valid) {

			$query = "INSERT INTO user (name,user,email,password) VALUES ('$name','$user','$mail','$password')";
		  		//$result= mysqli_query($db_server,$query);

				$result	= mysqli_query($db_server,$query) or die("Can't insert data into data into database.".mysqli_error($db_server));
				if($result) {
					$msg = "Data Submitted to Database";	
						header("Location:crud.php?msg=".$msg);
					}
						
						}else{
						header("Location:crud.php?msg=".$msg);
					}
}
?>