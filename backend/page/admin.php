<?php
$userData = new AllRouter();
if (
    isset($_SESSION["member_id"]) && 
    isset($_SESSION["exp"]) && 
    isset($_SESSION["time_og"])
) {

    if (time() >= $_SESSION["exp"]) {
    $mem_id = $_SESSION["member_id"];
    $sql_checked = "SELECT * FROM admin WHERE id = ?";
    $stmt_checked = $conn->prepare($sql_checked);
    $stmt_checked->bindParam(1, $mem_id, PDO::PARAM_INT);
    $stmt_checked->execute();
    $data_checked = $stmt_checked->fetch(PDO::FETCH_OBJ);
    if($data_checked->logmax === 0) {
     session_destroy(); 
     header("Location: ?page=login"); 
     exit();
    } else {
    $thislog =  $data_checked->logmax - 1;
    $sql_users = "UPDATE admin SET logmax = ? WHERE id = ?";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->bindParam(1, $thislog, PDO::PARAM_INT);
    $stmt_users->bindParam(2, $mem_id, PDO::PARAM_INT);
    $stmt_users->execute();
    session_destroy(); 
    header("Location: ?page=login"); 
    exit();
    }
}
} else {
    header("Location: ?page=login");
    exit();
}
$mem_data = $userData->queryex($_SESSION["member_id"], $conn);
?>
<style>
 img {
  pointer-events: none;
 }
 body {
  font-family: 'Prompt';
  background: rgb(159, 164, 166) !important;
 }
 .shadow {
  filter: drop-shadow(0 0 0.30rem black) contrast(150%);
 } 
 .prf {
  background: #4f46e5;
 }
 .logout {
  background: #ea580c;
 }
 .ln {
  box-shadow: 0 6px 10px 2px #000;
 } 
 .ln:hover {
  background: transparent;
 }
 .app-main {
  background-size: cover;  
  background-repeat: repeat;
  background-color: rgb(33, 37, 41); 
 }
</style>
<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="text-white bi bi-list"></i> </a> </li>
                </ul>

 <?php
if (isset($_POST['logout'])) {
    $mem_id = $_SESSION["member_id"];
    $sql_checked = "SELECT * FROM admin WHERE id = ?";
    $stmt_checked = $conn->prepare($sql_checked);
    $stmt_checked->bindParam(1, $mem_id, PDO::PARAM_INT);
    $stmt_checked->execute();
    $data_checked = $stmt_checked->fetch(PDO::FETCH_OBJ);
    if($data_checked->logmax === 0) {
     session_destroy(); 
     header("Location: ?page=login"); 
     exit();
    } else {
    $thislog =  $data_checked->logmax - 1;
    $sql_users = "UPDATE admin SET logmax = ? WHERE id = ?";
    $stmt_users = $conn->prepare($sql_users);
    $stmt_users->bindParam(1, $thislog, PDO::PARAM_INT);
    $stmt_users->bindParam(2, $mem_id, PDO::PARAM_INT);
    $stmt_users->execute();
    session_destroy(); 
    header("Location: ?page=login"); 
    exit();
    }

}
?>
<div>
 <a class="btn prf ln text-light" href="?page=admin&subpage=profile"><i class="fa-regular fa-id-card"></i> Profile</a>
<a id="destroy" href="#" class="btn logout ln text-white px-2 py-1 mx-4">
  <i class="fa-solid fa-person-to-door"></i>  Logout 
</a>
</div>

<form id="logoutForm" method="post" style="display: none;">
    <input type="hidden" name="logout" value="1">
</form>

<script type="module">
import { ConfirmMessage } from "./assets/js/alert.js"
    const destroy = document.querySelector("#destroy")
    destroy.addEventListener("click", () => {
        ConfirmMessage()
    })
</script>
            </div>
        </nav>
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand"> 
<img src="assets/img/bsjlogo.png" alt="LOGO" class="img-lg">
<a href="#" class="brand-link"> <span class="brand-text fw-light">Students information </span> </a> </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
       <a href="#" class="nav-link active"><i class="fa-sharp fa-solid fa-house-chimney"></i><p>หน้าแรก<i class="nav-arrow"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="?page=admin&subpage=showData" class="nav-link"> <i class="fa-solid fa-turn-down-right"></i><p>home</p> </a> </li>
                            </ul>
                        </li>
       <li class="nav-item">
       <a href="#" class="nav-link active"><i class="fa-solid fa-user-pen"></i><p>จัดการ account<i class="nav-arrow"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="?page=admin&subpage=adminData" class="nav-link"> <i class="fa-solid fa-turn-down-right"></i><p>account</p> </a> </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> 
                                <i class="fa-solid fa-pen-to-square i-ed"></i><p>แก้ไขข้อมูลนักเรียน<i class="nav-arrow "></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="?page=admin&subpage=studentsUpdate" class="nav-link"><i class="fa-solid fa-turn-down-right"></i><p>Edit information</p> </a> </li>
                            </ul>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="fa-solid fa-images-user i-list"></i>
                                <p>รายชื่อ</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="?page=admin&subpage=studentsDataLate" class="nav-link"><i class="fa-solid fa-turn-down-right"></i><p>students late</p> </a> </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> <a href="?page=admin&subpage=studentsData" class="nav-link"><i class="fa-solid fa-turn-down-right"></i><p>students</p> </a> </li>
                            </ul>
                        </li>
                        <li class="nav-header">Overview</li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="fa-sharp fa-solid fa-chart-simple"></i><p>สถิติ</p>
                            </a>
                            <ul class="nav nav-treeview">

                        <li class="nav-item"> <a href="#" class="nav-link"><i class="fa-solid fa-turn-down-right"></i><p>data</p> </a> </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <main class="app-main container">
<?php 
//$fetchData = new AllRouter(); ประกาศหน้า index แล้วใช้ $router
if (isset($_GET["page"]) && isset($_GET["subpage"])) {
   if ($router->subspecify($g, "studentsDataLate")) { 
       require("page/stdDataLate.php");
    } elseif($router->subspecify($g, "studentsData")) {
       require("page/stdData.php");
    } elseif($router->subspecify($g, "showData")) {
       require("page/showData.php");
    } elseif($router->subspecify($g, "adminData")) {
       require("page/adminData.php");
    } elseif($router->subspecify($g, "profile")) {
       require("page/profile.php");
    } elseif($router->subspecify($g, "reset")) {
       require("page/resetPwd.php");
    } elseif($router->subspecify($g, "history")) {
       require("page/history.php");
    }
   } else {
    header("Location: ?page=admin&subpage=showData");
    exit();
   }
?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="page/dist/js/adminlte.js"></script>
</body>
