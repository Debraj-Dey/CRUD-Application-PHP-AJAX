<?php
include ('connect.php');

$sql = "SELECT * FROM `crudAjax`";
$result = mysqli_query($conn, $sql);

if ($result) {
    $rowNum = mysqli_num_rows($result);

    if ($rowNum <= 0) {
        echo "No rows to fetch";
    } else {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}

echo json_encode($data);
?>