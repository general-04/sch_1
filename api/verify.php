<?php

require ("../db/connect.php");

$Request_method = $_SERVER["REQUEST_METHOD"];
 if($Request_method === "POST"){
   $studentId = filter_input(INPUT_POST, 'stId', FILTER_VALIDATE_INT);

   if(isset($studentId) && is_numeric($studentId)){
    $sql_first = "SELECT * FROM mytable WHERE student_id = ?";
    $stmt_first = $conn->prepare($sql_first);
    $stmt_first->execute([$studentId]); 
    $data = $stmt_first->fetch(PDO::FETCH_OBJ);

     if($data){
      $sql_check = "SELECT * FROM late_students WHERE id = ?";
      $stmt_check = $conn->prepare($sql_check);
      $stmt_check->execute([$data->id]);
      $existing_data = $stmt_check->fetch(PDO::FETCH_OBJ);

       if($existing_data){
       $quantity = $existing_data->quantity + 1;
       $date = date("Y-m-d"); 
       $sql_update = "UPDATE late_students SET quantity = ?, date = ? WHERE id = ? ";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->execute([$quantity, $date, $existing_data->id]);

      $response = [
           "status" => true,
           "payload" => $studentId,
           "message" => "Record increase",
           "id" => [
           "uid" => $existing_data->id,
           "name" => $existing_data->name,
           "class" => "$existing_data->year/$existing_data->section",
           "late" => $existing_data->quantity,
           "date" => $existing_data->date
          ]
        ];
       
       }  else {
        $sql_end = "INSERT INTO late_students (id, name, year, section, student_id, quantity, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $id = $data->id;
      $name = $data->name;
      $year = $data->year;
      $section = $data->section;
      $student_id = $data->student_id;
      $quantity = 1;
      $date = date("Y-m-d");
      $stmt_end = $conn->prepare($sql_end);
      $stmt_end->execute([$id, $name, $year, $section, $student_id, $quantity, $date]);

          $response = [
           "status" => true,
           "payload" => $studentId,
           "message" => "New record",
           "id" => [
           "uid" => $existing_data->id,
           "name" => $existing_data->name,
           "class" => "$existing_data->year/$existing_data->section",
           "late" => $existing_data->quantity,
           "date" => $existing_data->date
          ]
        ];
        
       }
      
     } else {

          $response = [
           "status" => false,
           "payload" => $studentId,
           "message" => "No data found"
        ];
      
     }
   } else {

          $response = [
           "status" => false,
           "payload" => $studentId,
           "message" => "Wrong data"
        ];
     
   }
 } else {
          $response = [
           "status" => false,
           "payload" => "do not have",
           "message" => "Only method POST"
        ];
     
   }
echo json_encode($response);

?>

