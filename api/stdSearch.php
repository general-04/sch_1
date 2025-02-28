<?php

require("../db/connect.php");

$Request_method = $_SERVER["REQUEST_METHOD"];
 if($Request_method === "GET"){

   if (isset($_GET['searchData']) && !empty($_GET['searchData'])) {
       $stId = trim($_GET['searchData']);
       $sql_data = "SELECT name, section, year FROM mytable WHERE student_id = ?";
       $stmt = $conn->prepare($sql_data);
       $stmt->execute([$stId]);
       $dataShow = $stmt->fetch(PDO::FETCH_OBJ);

      if($dataShow){
       
       $res = [
            "name" =>  $dataShow->name,
            "class" => $dataShow->section,
            "year" =>  $dataShow->year,
            "status" => true
              ];
      } else {
 $res = [
            "name" =>  "Empty",
            "class" => "Empty",
            "year" =>  "Empty",
            "status" => false
              ];      
      }
       } else {

 $res = [
            "name" =>  "Empty",
            "class" => "Empty",
            "year" =>  "Empty",
            "status" => false
              ];

   }
} else {
 $res = [
            "name" =>  "Empty",
            "class" => "Empty",
            "year" =>  "Empty",
            "message" => "Only get method",
            "status" => false
              ];
}
echo json_encode($res);

?>