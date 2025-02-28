<?php

session_start();
require("../../db/connect.php");
$req = $_SERVER["REQUEST_METHOD"];
$mem_id = $_SESSION["member_id"];

 if($req === "POST") {
  $limit = $_POST["limitUsr"];
  if(!empty($limit)) {
   $sqlLimit = "UPDATE admin SET limitusr = ? WHERE id = ?";
   $stmtLimit = $conn->prepare($sqlLimit);
   $stmtLimit->bindParam(1, $limit, PDO::PARAM_INT);
   $stmtLimit->bindParam(2, $mem_id, PDO::PARAM_INT);
   $exe = $stmtLimit->execute();
    if($exe) {
     $sqlUpdate = "SELECT limitusr FROM admin WHERE id = ?";
     $stmtUpdate = $conn->prepare($sqlUpdate);
     $stmtUpdate->bindParam(1, $mem_id, PDO::PARAM_INT);
     $stmtUpdate->execute();
     $dataUpdate = $stmtUpdate->fetch(PDO::FETCH_OBJ);
     $res = [
        "status" => true, 
        "message" => "Successfully!",
        "updateUser" => [
          "id" => $mem_id,
          "limitusr" => $dataUpdate->limitusr
        ]
      ];
    }
  } else {
  $res = [
   "status" => false, 
   "message" => "It's empty!"
   ];
  }
 } else {
  $res = [
   "status" => false, 
   "message" => "Only POST Method is allowed!"
  ];
 }
echo json_encode($res);

?>