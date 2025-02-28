<?php 
ob_start();
session_start();

require("db/connect.php");
require("assets/object/funcData.php"); 
$router = new AllRouter();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
      <meta name="theme-color" content="oklch(0.373 0.034 259.733)">
      <title>เข้าสู่หลังบ้าน</title>
      <link href="https://kit-pro.fontawesome.com/releases/v6.3.0/css/pro.min.css" rel="stylesheet">
      <link rel="manifest" href="manifest.json">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <!--<link rel="stylesheet" href="assets/css/style.css">-->
      <link rel="stylesheet" href="assets/css/footer.css">
      <link rel="stylesheet" href="assets/css/page/adminForm.css">
      <link rel="stylesheet" href="assets/css/page/newEmail.css">
      <link rel="stylesheet" href="assets/css/page/newlimit.css">
      <link rel="stylesheet" href="assets/css/page/newac.css">
      <link rel="stylesheet" href="assets/css/page/newnm.css">
      <link rel="stylesheet" href="page/dist/css/adminlte.css">
      <link rel="stylesheet" href="page/dist/css/adminlte.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
   </head>
   <body>
    <?php 
     
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    $g = "GET";
   if ($router->specify($g,"login")) { 
     require("page/login.php");
    } elseif($router->specify($g,"admin")) {
     require("page/admin.php");
    }
   } else {
  echo "<script>window.location.href = '?page=login';</script>";
}
//ไม่รู้ทำไมต้องทำให้ซับซ้อนเหมือนกัน
     ?>
<script src="assets/js/nm.js"></script>
<script src="assets/js/em.js"></script>
<script src="assets/js/limitusr.js"></script>
<script src="assets/js/ac.js"></script>
<script src="assets/js/toastr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   </body>
</html>