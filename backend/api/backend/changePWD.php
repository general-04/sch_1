<?php

session_start();
require("../../db/connect.php");
$req = $_SERVER["REQUEST_METHOD"];
$mem_id = $_SESSION["member_id"];

if($req === "POST"){
 $pwd_old = $_POST["pwdOld"];
 $pwd_new = $_POST["pwdNew"];
 $pwdTotall = $pwd_old && $pwd_new; 
 if(isset($pwdTotall) && !empty($pwdTotall)){
  $sql_old = "SELECT * FROM admin WHERE id = ? AND password = ?";
  $stmt_old = $conn->prepare($sql_old);
  $stmt_old->bindParam(1, $mem_id, PDO::PARAM_INT);
  $stmt_old->bindParam(2, $pwd_old, PDO::PARAM_STR);
  $stmt_old->execute();
  $data = $stmt_old->fetch(PDO::FETCH_OBJ);

  if($data){
    if($data->password === $pwd_old) {
      $response = [
      "messg" => "successfully",
      "status" => true,
      "verify_pwd" => true
   ];
   $sql_new = "UPDATE admin SET password = ? WHERE id = ?";
   $stmt_new = $conn->prepare($sql_new);
   $stmt_new->bindParam(1, $pwd_new, PDO::PARAM_STR); 
   $stmt_new->bindParam(2, $mem_id, PDO::PARAM_INT); 
   $stmt_new->execute();
    } else {
   $response = [
      "messg" => "รหัสไม่ถูก",
      "status" => false,
      "verify_pwd" => false
   ];
  }
  } else {
   $response = [
      "messg" => "มีรหัสแต่ไม่ตรง",
      "status" => false,
      "verify_pwd" => false
   ];
  }
 } else {
   $response = [
      "messg" => "It's Empty!",
      "status" => false,
      "verify_pwd" => false
   ];
 }
} else {
   $response = [
      "messg" => "Only Method POST!",
      "status" => false,
      "verify_pwd" => false
   ];
 }
echo json_encode($response);

?>