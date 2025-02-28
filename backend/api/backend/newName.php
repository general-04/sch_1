<?php

session_start();
require("../../db/connect.php");
$mem_id = $_SESSION["member_id"];
$req = $_SERVER["REQUEST_METHOD"];

 if($req === "POST") {
  $username_new = trim($_POST["username"]);
  $password = trim($_POST["confirm_password"]);
  $both = $username_new && $password;
  if(isset($both) && !empty($both)) {
   $sqlUsr = "SELECT * FROM admin WHERE id = ?";
   $stmtUsr = $conn->prepare($sqlUsr);
   $stmtUsr->bindParam(1, $mem_id, PDO::PARAM_INT);
   $stmtUsr->execute();
   $usr_data = $stmtUsr->fetch(PDO::FETCH_OBJ);
    if($usr_data) {
     if($usr_data->password === $password) {
      $updateUsername = $usr_data->level."_".$username_new;
      $sqlNewName = "UPDATE admin SET username = ? WHERE id = ?";
      $stmtNewName = $conn->prepare($sqlNewName);
      $stmtNewName->bindParam(1, $updateUsername, PDO::PARAM_STR);
      $stmtNewName->bindParam(2, $mem_id, PDO::PARAM_INT);
      $exeUpdate = $stmtNewName->execute();
       if($exeUpdate) {
         $sqlUp = "SELECT * FROM admin WHERE id = ?";
         $stmtUp = $conn->prepare($sqlUp);
         $stmtUp->bindParam(1, $mem_id, PDO::PARAM_INT);
         $stmtUp->execute();
         $dataUpdate = $stmtUp->fetch(PDO::FETCH_OBJ);
         $res = [
          "status" => true, 
          "message" => "Username updated successfully!",
          "updateUser" => [
          "id" => $dataUpdate->id,
         "username" => $dataUpdate->username
          ]
        ]; 
       } else {
         $res = [
          "status" => true, 
          "message" => "Updated some info!",
          "updateUser" => [
          "id" => $dataUpdate->id,
         "username" => $dataUpdate->username
          ]
        ]; 
       }
     } else {
   $res = [
    "status" => false, 
    "message" => "Password does not match database!"
  ]; 
     }
    } else {
  $res = [
    "status" => false, 
    "message" => "not found memberID!"
  ]; 
    } 
  } else {
  $res = [
    "status" => false, 
    "message" => "username or password is empty!"
  ]; 
  } 
 } else {
  $res = [
    "status" => false, 
    "message" => "Only POST Method is allowed"
  ]; 
 }
echo json_encode($res);

?>