<?php
include_once("connection.php");
$postdata=file_get_contents("php://input");
if (isset($postdata) && !empty($postdata))
{
   $request=json_decode($postdata);
   $f_name=trim($request->f_name);
   $email= mysqli_real_escape_string($mysqli,trim($request->email)); 
   $password= mysqli_real_escape_string($mysqli,trim($request->password));  
   $phone=trim($request->phone);  
   $cin= mysqli_real_escape_string($mysqli,trim($request->cin));  
   $sql="INSERT INTO users ( f_name , email , password , phone , cin ) VALUES ( '$f_name ', '$email' , '$password','$phone','$cin' )" ;
   $sqll=" SELECT * FROM users where email='$email' ";
   $result = mysqli_query($mysqli,$sqll);
   $nums=mysqli_num_rows($result);
    
  if ($nums > 0) {

    echo json_encode(array('message' => 'failed'));
  }
  else if ($mysqli->query($sql)){
    echo json_encode(array('message' => 'success'));
  }
 
  

}

?>