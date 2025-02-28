<?php

//update profile
require("../../db/connect.php");
session_start();
$req = $_SERVER["REQUEST_METHOD"];
$mem_id = $_SESSION["member_id"];

 if($req === "POST") {
   $profile = $_FILES["profile"];
   $prf_name = $profile["name"];
   $prf_type = $profile["type"];
   $prf_err  = $profile["error"];
   $prf_tmp  = $profile["tmp_name"];
   $prf_size = $profile["size"];
   $allowed_type = ["image/png", "image/jpeg", "image/jpg", "image/gif", "image/webp"];
   $max_size = 10 * 1024 * 1024;
   
   if($prf_err === 0) {
    if(in_array($prf_type, $allowed_type)) {
     if($prf_size <= $max_size) { 
      $prf_data = file_get_contents($prf_tmp);
      $sql_prof = "UPDATE admin SET profile = ? WHERE id = ?";
      $stmt_prof = $conn->prepare($sql_prof);
      $stmt_prof->bindParam(1, $prf_data, PDO::PARAM_LOB);
      $stmt_prof->bindParam(2, $mem_id, PDO::PARAM_INT);
      $exc = $stmt_prof->execute();
      if($exc) {
      $response = [
       "status" => true, 
       "messg" => "change successfully",
       "file_current" => $prf_name,
       "type" => $prf_type,
       "size" => round($prf_size / (1024 * 1024)),
        "record" => [
         "user_id" => $mem_id,
         "method" => $req,
         "profile" => $prf_tmp ,
         "img" => base64_encode($prf_data)
      ]
     ];
      }
     } else {
     $response = [
        "status" => false,
        "messg" => "File size must not exceed " . round($max_size / (1024 * 1024)),
        "file_current" => $prf_name,
        "type" => $prf_type,
        "size" => round($prf_size / (1024 * 1024))
     ];
     }
    } else {
     $response = [
        "status" => false,
        "messg" => "File data type not allowed!",
        "file_current" => $prf_name,
        "type" => $prf_type,
        "size" => round($prf_size / (1024 * 1024))
     ];
    }
   } else {
    $response = [
      "status" => false, 
      "messg" => "It's empty!",
      "file_current" => $prf_name,
      "type" => $prf_type,
      "size" => round($prf_size / (1024 * 1024))
     ]; 
   }
 } else {
    $response = [
      "status" => false, 
      "messg" => "Only Method POST!",
      "file_current" => $prf_name,
      "type" => $prf_type,
      "size" => round($prf_size / (1024 * 1024))
     ];    
 }
echo json_encode($response);

?>