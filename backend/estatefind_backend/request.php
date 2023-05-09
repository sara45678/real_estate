<?php
include_once("connection.php");
$postdata=file_get_contents("php://input");
if (isset($postdata) && !empty($postdata))
{
   $request=json_decode($postdata);
   
   $id_user = (int)$request->id_user;
   
   
   $message=trim($request->message);  
   $sql="INSERT INTO request ( id_user , message  ) VALUES ( '$id_user ', '$message'  )" ;
  $res=$mysqli->query($sql);
   
  if($res) {

    echo json_encode(array('message' => 'success'));
  }
  else{
    echo json_encode(array('message' => 'failed'));
  }
 
  

}

?>