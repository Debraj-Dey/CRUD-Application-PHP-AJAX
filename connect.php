<?php
$host = "localhost";
$username = "root";
$password = null;
$database = "crud";

$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Error connection :" . mysqli_connect_error());
} else {

}
?>