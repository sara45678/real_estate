<?php
include_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $postdata = file_get_contents("php://input");

  if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);

    if (
      isset($request->id_user) &&
      isset($request->Title) &&
      isset($request->surface) &&
      isset($request->nb_bedroom) &&
      isset($request->nb_bathroom) &&
      isset($request->type) &&
      isset($request->price) &&
      isset($request->address) &&
      isset($request->email) &&
      isset($request->pic1)
    ) {
      $id_user = (int)$request->id_user;
      $title = mysqli_real_escape_string($mysqli, trim($request->Title));
      $surface = (double)$request->surface;
      $nb_bedroom = (int)$request->nb_bedroom;
      $nb_bathroom = (int)$request->nb_bathroom;
      $type = mysqli_real_escape_string($mysqli, trim($request->type));
      $price = (double)$request->price;
      $address = mysqli_real_escape_string($mysqli, trim($request->address));
      $email = mysqli_real_escape_string($mysqli, trim($request->email));
      $pic1Contents = mysqli_real_escape_string($mysqli, $request->pic1);
      
      $sql = "INSERT INTO proprities (id_user, Title, surface, nb_badroom, nb_bathroom, type, price, adress, email, pic1)
              VALUES ($id_user, '$title', $surface, $nb_bedroom, $nb_bathroom, '$type', $price, '$address', '$email', '$pic1Contents')";

      if ($mysqli->query($sql)) {
        echo json_encode(array('message' => 'success'));
      } else {
        echo json_encode(array('message' => 'failed'));
      }
    } else {
      echo json_encode(array('message' => 'Missing required fields'));
    }
  } else {
    echo json_encode(array('message' => 'Invalid request data'));
  }
}
?>
