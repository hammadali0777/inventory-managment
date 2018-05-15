<?php 
include 'connection.php';
echo "<br>";
$sql = "SELECT * FROM post";

 $query = $db_server->query($sql);

while($row = $query->fetch_assoc()) {
      //   $name = $row['name'];
      // $mobile = $row['mobile'];

	
	echo "id: " . $row["id"]. " <br>- Name: " . $row["name"]. "Last Name " . $row["lsname"]. "Mobile No" . $row["mobile"]. "Email" . $row["email"]. "Password" . $row["password"]. "<br>";


	 // echo "<h1> $name </h1>";
	 // echo "<p> $mobile </p>";

    }

 

