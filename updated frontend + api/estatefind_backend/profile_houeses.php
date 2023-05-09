<?php
include_once("connection.php");

$postdata = file_get_contents("php://input"); // Retrieve request data
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $id = intval($request->id);
    $sql = "SELECT * FROM proprities WHERE id_user = $id";
    $result = mysqli_query($mysqli, $sql);
    $nums = mysqli_num_rows($result);

    if ($nums > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array('message' => 'No data found'));
    }
}
?>
