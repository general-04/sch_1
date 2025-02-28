<?php

require("../../db/connect.php");

$reqMethod = $_SERVER["REQUEST_METHOD"];
 if($reqMethod === "GET"){
  $username = $_GET["pname"];
   if(!empty($username) && isset($username)){
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username,PDO::PARAM_STR);
    $stmt->execute();
    $dataProfile = $stmt->fetch(PDO::FETCH_OBJ);
    if($dataProfile) {
     if($dataProfile->username === $username){
      $response = [
        "status" => true,
        "profile" => "data:image/png;base64,".base64_encode($dataProfile->profile)
];
     } else {
      $response = [
        "status" => false,
        "profile" => "not found"
];
      }
    } else {
      $response = [
        "status" => false,
        "profile" => "not found"
];
    }
   }
 }
echo json_encode($response);

?>