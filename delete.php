<?php
include ('connect.php');

$data = stripcslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$id = $mydata['sid'];
$response = array();

if (!empty($id)) {
    $sql = "DELETE FROM `crudAjax` WHERE `id`= '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = "Error in deletion " . mysqli_error($conn);
        die();
    } else {
        $response['status'] = 'success';
        $response['message'] = "Data Deleted successfully!";
    }
}

echo json_encode($response)

?>