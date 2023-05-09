<?php
include_once("connection.php");

$sql = "SELECT * FROM proprities where type='S' ";
$result = mysqli_query($mysqli, $sql);
$nums = mysqli_num_rows($result);

if ($nums > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $row['pic1'] = $row['pic1']; // Keep the image URL as it is
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array('message' => 'No data found'));
}
?>
