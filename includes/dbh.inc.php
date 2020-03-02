<?php 

$servername = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "extraclan";

$conn = mysqli_connect($servername, $dbUser, $dbPass, $dbName);

if (!conn) {
    die("Connection failed: ".mysqli_conect_error());
}

?>