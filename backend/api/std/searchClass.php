<?php
require("../../db/connect.php");
$Request_method = $_SERVER["REQUEST_METHOD"];

if($Request_method === "POST"){
    if(isset($_POST["payloadClass"]) && !empty($_POST["payloadClass"])) {
        $class = $_POST["payloadClass"];
        
        $sql = "SELECT * FROM mytable WHERE year = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(1, $class, PDO::PARAM_INT);
        $stmt->execute();
        
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        if($data) {
            $response = [
                "status" => true,
                "students" => []
            ];
            
            foreach ($data as $student) {
                $response["students"][] = [
                    "year" => $student->year,
                    "section" => $student->section,
                    "name" => $student->name,
                    "student_id" => $student->student_id
                ];
            }
        } else {
            $response = [
                "status" => false,
                "message" => "Class not found"
            ];
        }
    } else {
        $response = [
            "status" => false,
            "message" => "Payload not found"
        ];
    }
} else {
    $response = [
        "status" => false,
        "message" => "Only POST method is allowed"
    ];
}

echo json_encode($response);
?>