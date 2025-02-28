<?php

require("../../db/connect.php");

$req = $_SERVER["REQUEST_METHOD"];
 if($req === "POST") {
     $changereq = json_decode(file_get_contents("php://input"), true);
     $userId = $changereq["userId"];
     
     if(isset($userId) && !empty($userId)) {
         $sql = "SELECT * FROM admin WHERE id = ?";
         $stmt_id = $conn->prepare($sql);
         $stmt_id->bindParam(1, $userId, PDO::PARAM_INT);
         $stmt_id->execute();
         $data = $stmt_id->fetch(PDO::FETCH_OBJ);
          if($data) {
              $res = [
             "RESstatus" => true,
             "id" => $data->id,
             "username" => $data->username,
             "email" => $data->email,
             "level" => $data->level,
             "status" => $data->status,
             "e_pin" => $data->e_pin,
             "access" => $data->access,
             "date" => $data->date,
             "limitusr" => $data->limitusr,
             "logmax" => $data->logmax,
             "profile" => base64_encode($data->profile)
             ];
          } else {
         $res = [
         "status" => false,
         "message" => "Wrong!"
         ];
          }
     } else {
         $res = [
         "status" => false,
         "message" => "empty!"
         ];
     }
 } else {
         $res = [
         "status" => false,
         "message" => "Only 'POST' Method"
         ];
 }
echo json_encode($res);

?>