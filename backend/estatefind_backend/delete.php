<?php
include_once("connection.php");
$postdata = file_get_contents("php://input"); // Retrieve request data
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $id = intval($request->id);
    $sql = "delete  FROM proprities where id=$id ";
    $result = mysqli_query($mysqli, $sql);
   

    if ($result) {
        echo json_encode(array('message' => 'succes'));
    }      
    
   
 else {
    echo json_encode(array('message' => 'failed'));
  }
}
?>