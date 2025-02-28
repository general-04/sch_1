<?php

require("../../db/connect.php");

$req = $_SERVER["REQUEST_METHOD"];

 if($req === "POST") {
     $f_id = $_POST["userId"];
     $f_username = $_POST["username"];
     $f_email = $_POST["email"];
     $f_logmax = $_POST["logmax"];
     $f_access = $_POST["access"];
     $f_limit = $_POST["limit"];
     $f_level = $_POST["level"];
     $f_status = $_POST["status"];
     $f_passwd = $_POST["password"];
     if (empty($_POST["epin"])) {
        $_POST["epin"] = null;
        $f_epin = $_POST["epin"]; 
     }
      if(empty($_FILES["profile"]["name"])) {
          $_FILES["profile"] = "../../assets/img/default.png";
          $f_profile = file_get_contents($_FILES["profile"]);
          $res["profile"] = "default";
      } else {
          $f_profile = file_get_contents($_FILES["profile"]["tmp_name"]);
      }
      if(isset($f_id) && !empty($f_id)) {
          $sql = "UPDATE admin SET 
          username = ?, 
          email = ?, 
          logmax = ?, 
          e_pin = ?, 
          access = ?, 
          limitusr = ?, 
          level = ?, 
          status = ?, 
          profile = ?
          ";
          if(!empty($f_passwd)) {
              $sql .= ", password = ?";
          }
          $sql .= "WHERE id = ?";
          $stmt_update = $conn->prepare($sql);
          $stmt_update->bindParam(1, $f_username);
          $stmt_update->bindParam(2, $f_email);
          $stmt_update->bindParam(3, $f_logmax);
          $stmt_update->bindParam(4, $f_epin);
          $stmt_update->bindParam(5, $f_access);
          $stmt_update->bindParam(6, $f_limit);
          $stmt_update->bindParam(7, $f_level);
          $stmt_update->bindParam(8, $f_status);
          $stmt_update->bindParam(9, $f_profile);
          if (!empty($f_passwd)) {
            $stmt_update->bindParam(10, $f_passwd);
            $stmt_update->bindParam(11, $f_id, PDO::PARAM_INT);
        } else {
            $stmt_update->bindParam(10, $f_id, PDO::PARAM_INT);
        }
          $stmt_update->execute();
           if($stmt_update->rowCount()) {
               $res = [
                   "RESstatus" => true,
                   "message" => "update successfully ",
                   "profile" => "uploaded"
                   ];
           } else {
               $res = [
                   "RESstatus" => "warning",
                   "message" => "update falsely or Duplicate data recording"
                   ];
           }
      } else {
               $res = [
                   "RESstatus" => false,
                   "message" => "empty!"
                   ];
      }
 } else {
               $res = [
                   "RESstatus" => false,
                   "message" => "Only 'POST' Method"
                   ];
 }
echo json_encode($res);

?>