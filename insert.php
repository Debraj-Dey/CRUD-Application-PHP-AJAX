<?php
include ('connect.php');

// stripslashes function can be used to clean up data retrieved fomr a database or from an HTML form

//php://input - This ia a read only stream taht allows us to read eaw data from athe request body. It return all the eaq data after the HTTP headers of the request, regardless of the content type

// json_decode - IT takes JSON string and covnerts it into a PHP object or array, it true then associative array

// The file_get_contents() function in PHP is an inbuilt function that is used to read a file into a string.

$data = stripcslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);

$name = $mydata['name'];
$gender = $mydata['gender'];
$email = $mydata['email'];
$number = $mydata['number'];
$address = $mydata['address'];

//This is my response for sending back to the ajax call
$response = array();

//Now inserting data

if (!empty($name) && !empty($gender) && !empty($email) && !empty($number) && !empty($address)) {
    $sql = "INSERT INTO `crudAjax` (`id`,`Name`,`Gender` ,`Email`, `Mobile`, `Address`) VALUES (NULL, '$name', '$gender','$email', '$number', '$address')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = "Error in addition " . mysqli_error($conn);
        die();
    } else {
        $response['status'] = 'success';
        $response['message'] = "User added successfully!";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "All fields are required!";
}

// The json_encode() function is used to encode a value to JSON format.

echo json_encode($response);//This will go as a response to the AJAX call
?>