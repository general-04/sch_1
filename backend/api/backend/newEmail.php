<?php

session_start();
require("../../db/connect.php");
$mem_id = $_SESSION["member_id"];
$req = $_SERVER["REQUEST_METHOD"];

 if($req === "POST") {
  $email = trim($_POST["email"]);
  $password = trim($_POST["confirm_password2"]);
  if(!empty($email) && !empty($password)) {
   $email_new = filter_var($email, FILTER_VALIDATE_EMAIL);
   if($email_new) {
   $sqlEmail = "SELECT * FROM admin WHERE id = ?";
   $stmtEmail = $conn->prepare($sqlEmail);
   $stmtEmail->bindParam(1, $mem_id, PDO::PARAM_INT);
   $stmtEmail->execute();
   $email_data = $stmtEmail->fetch(PDO::FETCH_OBJ);
    if($email_data) {
     if($email_data->password === $password) {
      $sqlNewEmail = "UPDATE admin SET email = ? WHERE id = ?";
      $stmtNewEmail = $conn->prepare($sqlNewEmail);
      $stmtNewEmail->bindParam(1, $email, PDO::PARAM_STR);
      $stmtNewEmail->bindParam(2, $mem_id, PDO::PARAM_INT);
      $exeUpdate = $stmtNewEmail->execute();
       if($exeUpdate) {
         $sqlUp = "SELECT * FROM admin WHERE id = ?";
         $stmtUp = $conn->prepare($sqlUp);
         $stmtUp->bindParam(1, $mem_id, PDO::PARAM_INT);
         $stmtUp->execute();
         $dataUpdate = $stmtUp->fetch(PDO::FETCH_OBJ);
         $res = [
          "status" => true, 
          "message" => "Email updated successfully!",
          "updateUser" => [
          "id" => $dataUpdate->id,
         "email" => $dataUpdate->email
          ]
        ]; 
       } else {
         $res = [
          "status" => true, 
          "message" => "Updated some info!",
          "updateUser" => [
          "id" => $dataUpdate->id,
         "email" => $dataUpdate->email
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
    "message" => "This email is invalid!"
  ]; 
   }
  } else {
  $res = [
    "status" => false, 
    "message" => "Empty or password is empty!"
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