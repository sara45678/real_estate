<?php
include_once("connection.php");
$postdata=file_get_contents("php://input");
if (isset($postdata) && !empty($postdata))
{  
    $request=json_decode($postdata);
  

    $email= mysqli_real_escape_string($mysqli,trim($request->email)); 
   $password= mysqli_real_escape_string($mysqli,trim($request->password));  
   $sql=" SELECT * FROM users where email='$email' and password='$password' ";
   $result = mysqli_query($mysqli,$sql);
    $nums=mysqli_num_rows($result);
    if ($nums > 0) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode(array('message' => 'success', 'data' => $data));
    } else {
        echo json_encode(array('message' => 'failed'));
    }
}
?>   