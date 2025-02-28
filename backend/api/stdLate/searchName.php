<?php

require("../../db/connect.php");

$resMethod = $_SERVER["REQUEST_METHOD"];
if($resMethod === "GET"){
 $name = $_GET["name"];
  if(isset($name) && !empty($name)){
   $sql = "SELECT * FROM late_students WHERE name LIKE ?";
   $stmt = $conn->prepare($sql);
   $name = "%$name%";
   $stmt->bindParam(1, $name, PDO::PARAM_STR); 
   $stmt->execute();
   $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    if($data){
     $response = [
      "status" => true, 
      "dataStd" => array_map(function($row){
       return [
                 "id" => $row->id,
                 "name" => $row->name,
                 "year" => $row->year,
                 "section" => $row->section,
                 "student_id" => $row->student_id,
                 "quantity" => $row->quantity,
                 "date" => $row->date
              ];
     }, $data)
        ];
    } else {
     $response = ["status" => false, "message" => "ไม่พบ"];
    }
  } else {
   $response = ["status" => false, "message" => "กรุณาพิมพ์ชื่อ"];
  }
} else {
 $response = ["status" => false, "message" => 'Only "GET" Method'];
}

echo json_encode($response);

?>