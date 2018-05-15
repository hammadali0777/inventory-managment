<?php

$hostname="localhost";
$user="root";
$password="vagrant";
$dbname="view";
$port = "33066";

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo '';
}

// Create connection
$db_server = new Mysqli($hostname, $user, $password, $dbname, $port);
// Check connection
if ($db_server->connect_error) {
    die("Connection failed: " . $db_server->connect_error);
} 
echo "Connected successfully. <br>";
?>
