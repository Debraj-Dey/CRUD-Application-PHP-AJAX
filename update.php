<?php
include ('connect.php');

$data = stripcslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$id = $mydata['id'];
$name = $mydata['name'];
$gender = $mydata['gender'];
$email = $mydata['email'];
$mobile = $mydata['number'];
$address = $mydata['address'];

$response = array();

if (!empty($id) && !empty($name) && !empty($gender) && !empty($email) && !empty($mobile) && !empty($address)) {
    $sql = "UPDATE `crudAjax` SET `Name`='$name', `Email`='$email', `Gender`='$gender',`Mobile`='$mobile', `Address`='$address' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = "Error in updation " . mysqli_error($conn);
        die();
    } else {
        $response['status'] = 'success';
        $response['message'] = "Data updated successfully";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "All fields are required !!";
}

echo json_encode($response);
?>