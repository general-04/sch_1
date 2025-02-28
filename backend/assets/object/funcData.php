<?php

class AllRouter {

   public function queryex($member_id, $conn){
    if(isset($member_id) && !empty($member_id)){
     $mem_sql = "SELECT * FROM admin WHERE id = ?";
     $mem_stmt = $conn->prepare($mem_sql);
     $mem_stmt->bindParam(1, $member_id, PDO::PARAM_INT);
     $mem_stmt->execute();
     $mem_data = $mem_stmt->fetch(PDO::FETCH_OBJ);
     return $mem_data;
    } else {
     return;
    }
   }

   public function specify($method, $valuePage){
      if ($method === "GET") {
         return isset($_GET["page"]) && $_GET["page"] === $valuePage;
      } else {
         return false;
      }
   }

   public function subspecify($method, $valuePage){
      if ($method === "GET") {
         return isset($_GET["subpage"]) && $_GET["subpage"] === $valuePage;
      } else {
         return false;
      }
   }

   public function allData($specify,$conn){
    $sql = "SELECT * FROM $specify";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount(); //จำนวน rows
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    echo $count;
} 

}

?> 