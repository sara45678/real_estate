<?php
include_once("connection.php");
$postdata = file_get_contents("php://input"); // Retrieve request data
if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);
    $id = intval($request->id);
   $newValue1 = trim($request->title);  // New value for column1
    $newValue2 = trim($request->price);
    $newValue3 = trim($request->type); // New value for column2

$sql = "UPDATE proprities SET Title = '$newValue1', price = '$newValue2'  , type = '$newValue3' WHERE id = $id";

    $result = mysqli_query($mysqli, $sql);
   

    if ($result) {
        echo json_encode(array('message' => 'succes'));
    }      
    
   
 else {
    echo json_encode(array('message' => 'failed'));
  }
}
?>