<?php
include ('connect.php');

$data = stripcslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$id = $mydata['sid'];

$sql = "SELECT * FROM `crudAjax` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);

if($result)
{
    $row = mysqli_fetch_assoc($result);
}

echo json_encode($row);
?>