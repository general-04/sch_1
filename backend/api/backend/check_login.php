<?php

ini_set('session.use_strict_mode', '1');
ini_set('session.cookie_httponly', '1');
session_start();
require("../../db/connect.php");

$Request_method = $_SERVER["REQUEST_METHOD"];
if ($Request_method === "POST") {
    $usernm = $_POST["username"];
    $passwd = $_POST["password"];
    
    if (isset($usernm) && isset($passwd) && !empty($usernm) && !empty($passwd)) {
        $sql_check = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql_check);
        $stmt->bindParam(1, $usernm, PDO::PARAM_STR);
        $stmt->bindParam(2, $passwd, PDO::PARAM_STR);
        $stmt->execute();
        $dataForm = $stmt->fetch(PDO::FETCH_OBJ);
       if($dataForm) {
        $userlog = $dataForm->username;
        $passlog = $dataForm->password;
        if ($userlog === $usernm && $passlog === $passwd) {
            if ($dataForm->logmax >= $dataForm->limitusr) {
                $response = [
                    "status" => false,
                    "message" => $dataForm->limitusr,
                    "keyMs" => "maxUsers"
                ];
            } else {
                if($dataForm->logmax < 0) {
                 $dataForm->logmax = 1;
                }
                $thisUser = $dataForm->logmax + 1;
                $sqlUsers = "UPDATE admin SET logmax = ? WHERE username = ?";
                $stmtUsers = $conn->prepare($sqlUsers);
                $stmtUsers->bindParam(1, $thisUser, PDO::PARAM_INT);
                $stmtUsers->bindParam(2, $usernm, PDO::PARAM_STR);
                $stmtUsers->execute();

                date_default_timezone_set('Asia/Bangkok');
                $_SESSION["member_id"] = $dataForm->id;
                $_SESSION["username"] = $dataForm->username;
                $_SESSION["status"] = $dataForm->status;
                $_SESSION["exp"] = time() + $dataForm->access;
                $_SESSION["time_og"] = time();
                session_regenerate_id(true);
                $response = [
                    "status" => true,
                    "message" => "successfully",
                    "limitusr" => $dataForm->limitusr,
                    "name" => $dataForm->username,
                    "dataSetss" => [
                        "username" => $_SESSION["username"],
                        "status" => $_SESSION["status"],
                        "userLogin" => $thisUser,
                        "exp" => date("Y-m-d H:i:s", $_SESSION["exp"]),
                        "time_og" => date("Y-m-d H:i:s", $_SESSION["time_og"]),
                        "exp_timestamp" => $_SESSION["exp"],
                        "time_og_timestamp" => $_SESSION["time_og"]
                    ]
                ];
            }
         } else {
            $response = [
                "status" => false,
                "message" => "The info is incorrect",
                "keyMs" => "wrong"
            ];
         }
        } else {
            $response = [
                "status" => false,
                "message" => "Not data found",
                "keyMs" => "notFound"
            ];
        }
    } else {
        $response = [
            "status" => false,
            "message" => "Only numbers",
            "keyMs" => "empty"
        ];
    }
} else {
    $response = [
        "status" => false,
        "message" => "Only POST method",
        "keyMs" => "onlyPOST"
    ];
}

echo json_encode($response);
?>