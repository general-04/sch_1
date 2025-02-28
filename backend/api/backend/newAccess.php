<?php

session_start();
require("../../db/connect.php");
$req = $_SERVER["REQUEST_METHOD"];
$mem_id = $_SESSION["member_id"];

 if($req === "POST") {
  $access = $_POST["timeAccess"];
  if(!empty($access)) {
   $sqlAccess = "UPDATE admin SET access = ? WHERE id = ?";
   $stmtAccess = $conn->prepare($sqlAccess);
   $stmtAccess->bindParam(1, $access, PDO::PARAM_INT);
   $stmtAccess->bindParam(2, $mem_id, PDO::PARAM_INT);
   $exe = $stmtAccess->execute();
    if($exe) {
     $sqlUpdate = "SELECT access FROM admin WHERE id = ?";
     $stmtUpdate = $conn->prepare($sqlUpdate);
     $stmtUpdate->bindParam(1, $mem_id, PDO::PARAM_INT);
     $stmtUpdate->execute();
     $dataUpdate = $stmtUpdate->fetch(PDO::FETCH_OBJ);
     $res = [
        "status" => true, 
        "message" => "Successfully!",
        "updateUser" => [
          "id" => $mem_id,
          "access" => $dataUpdate->access / 60 
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