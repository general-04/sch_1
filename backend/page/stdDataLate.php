<style>
 a {
  text-decoration: none;
 }
</style>
           <div class="head-body bg-dark" data-bs-theme="dark">
             <div class="app-content-header">
                <div class="container-fluid">
                    <div class="head-title d-flex  justify-content-between">
                        <div class="head-1 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><i class="fa-solid fa-user-tie"></i>&nbsp;<b>รายชื่อนักเรียน</b></p>
                        </div>
                        <div class="head-2 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><a class="text-info" href="?page=admin&subpage=showData">home</a>&nbsp; / &nbsp;students</p>
                        </div>

                    </div>

<?php 

$rows_setAt = 60;
if (isset($_GET["setAtLate"])) {
    $setAt = $_GET["setAtLate"];
} else {
    $setAt = 1;
}
$sql_total = "SELECT COUNT(*) as total FROM late_students";
$stmt_total = $conn->prepare($sql_total);
$stmt_total->execute();
$fetch_total = $stmt_total->fetch(PDO::FETCH_OBJ);
$page_setAt = ceil($fetch_total->total / $rows_setAt); 
// Scope 
if ($setAt < 1) {
    $setAt = 1;
} elseif ($setAt > $page_setAt) {
    $setAt = $page_setAt;
} 
$offset = ($setAt - 1) * $rows_setAt; //offset ตามจำนวน setAt เพื่อหาตำแหน่ง

$sql_limit = "SELECT * FROM late_students ORDER BY id ASC LIMIT ?,?";
$stmt_limit = $conn->prepare($sql_limit);
$stmt_limit->bindParam(1, $offset, PDO::PARAM_INT);
$stmt_limit->bindParam(2, $rows_setAt, PDO::PARAM_INT);
$stmt_limit->execute();
?>
   <!-- page -->
<form>
    <div class="input-group search-std mt-3 mb-1">
        <span class="input-group-text rounded">
            <i class="fa-regular fa-magnifying-glass"></i>&nbsp;ค้นหาหน้าที่ <?php echo "$setAt จาก $page_setAt"; ?>
        </span>
        <input type="number" name="number" min="0" max="38" class="form-control rounded inp-fill" id="numinp" min="1">
        <button type="button" class="btn btn-primary rounded" id="search">ค้นหา</button> 
    </div>

</form>
   <!-- section -->
<form id="formClass">
    <div class="input-group search-std mb-2 mt-2">
        <span class="input-group-text rounded">
            <i class="fa-regular fa-magnifying-glass"></i>&nbsp;ชั้นปี
        </span>
        <select class="form-select inp-fill rounded" name="SrClass" id="select"> 
         <option value="0">ไม่เลือก</option>
         <option value="1">มัธยมศึกษาปีที่ 1</option>
         <option value="2">มัธยมศึกษาปีที่ 2</option>
         <option value="3">มัธยมศึกษาปีที่ 3</option>
         <option value="4">มัธยมศึกษาปีที่ 4</option>
         <option value="5">มัธยมศึกษาปีที่ 5</option>
         <option value="6">มัธยมศึกษาปีที่ 6</option>
        </select>
        <!--<button type="button" class="btn btn-primary" id="searchClass">ค้นหา</button> -->
    </div>

</form>
   <!-- student name -->
<form id="formName">
    <div class="input-group search-std mb-3 mt-1">
        <span class="input-group-text rounded">
            <i class="fa-regular fa-magnifying-glass"></i>&nbsp;ระบุบชื่อนักเรียน
        </span>
        <input type="text" name="name" class="form-control rounded inp-fill" id="name">
        <!--<button type="button" class="btn btn-primary" id="searchName">ค้นหา</button> -->
    </div>

</form>


<div class="my-2 on-table rounded">
    <table class="tableShow table table-hover table-bordered table-dark custom-border">
        <thead class="table-light">
            <tr class="text-nowrap">
  <th>#</th>
  <th><i class="fa-regular fa-circle-user"></i> ชื่อนักเรียน</th>
  <th><i class="fa-regular fa-circle-chevron-right"></i> ปี</th>
  <th><i class="fa-regular fa-circle-chevron-right"></i> ชั้น</th>
  <th><i class="fa-light fa-id-card"></i> StdID</th>
  <th><i class="fa-sharp fa-light fa-alarm-exclamation"></i> สาย</th>
  <th><i class="fa-regular fa-calendar"></i> ล่าสุด</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
   <?php if($setAt <= $page_setAt){ ?>
            <?php 
            $count = ($setAt - 1)  *  $rows_setAt + 1;
            while ($dataTable = $stmt_limit->fetch(PDO::FETCH_OBJ)) { ?>
                <tr>
  <td><?php echo $count++; ?></td>
  <td><?php echo $dataTable->name; ?></td>
  <td><?php echo $dataTable->year; ?></td>
  <td><?php echo $dataTable->section; ?></td>
  <td><?php echo $dataTable->student_id; ?></td>
  <td><?php echo $dataTable->quantity; ?></td>
  <td><?php echo $dataTable->date; ?></td>
                </tr>
            <?php } ?>
<?php } else { ?>
 
<!-- <div class="alert alert-warning" id="alert-w" role="alert">
   <div class="">
 <i class="fa-solid fa-warning"></i>&nbsp; วิธีใช้งาน
  </div>
  <div class="mx-3">
 <i class="fa-solid fa-circle-small text-danger"></i> &nbsp;
เฉพาะตัวเลข 1-<?php echo $page_setAt; ?> เท่านั้น
 </div>
</div> -->
<?php } ?>

<style>
 .alert-show-1 {
  display: none;
 }
 .page {
  display: none;
 }
</style>
 <div class="alert alert-warning alert-show-1" id="alert-w" role="alert">
   <div class="">
 <i class="fa-solid fa-warning"></i>&nbsp; แจ้งเตือน
  </div>
  <div class="mx-3" id="page">
 <i class="fa-solid fa-circle-small text-danger"></i> &nbsp;
เฉพาะตัวเลข 1-<?php echo $page_setAt; ?> เท่านั้น
 </div>
 <div class="mx-3">
 <i id="i1" class="fa-solid fa-circle-small "></i> &nbsp; ไม่มีนักเรียน ระดับชั้น นี้ที่มาสาย
</div>
<div class="mx-3">
 <i id="i2" class="fa-solid fa-circle-small "></i> &nbsp; ไม่พบชื่อนักเรียน
 </div>
</div>



        </tbody>
    </table>

    <div class="d-flex justify-content-between">

        <?php if ($setAt > 1) { ?>
            <a href="?page=admin&subpage=studentsData&setAt=<?php echo $setAt - 1; ?>" class="btn btn-primary">ก่อนหน้านี้</a>
        <?php } else { ?>
            <button class="btn btn-secondary" disabled>ก่อนหน้านี้</button>
        <?php } ?>

        <?php if ($setAt < $page_setAt) { ?>
            <a href="?page=admin&subpage=studentsData&setAt=<?php echo $setAt + 1; ?>" class="btn btn-primary">ถัดไป</a>
        <?php } else { ?>
            <button class="btn btn-secondary" disabled>ถัดไป</button>
        <?php } ?>
    </div>

    <div class="mt-3 text-light">
        <span>หน้าที่: <?php echo $setAt; ?> จาก <?php echo $page_setAt; ?> หน้า</span>
    </div>
</div>

</div>
                </div>
            </div>
</div>
<script src="assets/js/fnLateAPI.js"></script> 
<script>
const NameInp = document.querySelector("#name")
const NumInp = document.querySelector("#numinp")
const btnSearch = document.querySelector("#search")
const studentsTableBody = document.querySelector("#studentsTableBody")
const alertShow = document.querySelector("#alert-w")
const i1 = document.querySelector("#i1")
const i2 = document.querySelector("#i2")
const page = document.querySelector("#page")

const chgSrClass = document.querySelector("#select")
const btnSrName = document.querySelector("#searchName")

const tableNotFound = () => {
 studentsTableBody.innerHTML = ""
 alertShow.style.display = "block"
 page.style.display = "none"
}

const updateTable = (students) => {
  studentsTableBody.innerHTML = ""
  alertShow.style.display = "none"
  students.forEach((student, index) => {
    const row = document.createElement("tr")
    row.innerHTML = `
      <td>${index + 1}</td>
      <td>${student.name}</td>
      <td>${student.year}</td>
      <td>${student.section}</td>
      <td>${student.student_id}</td>
      <td>${student.quantity}</td>
      <td>${student.date}</td>
    `
    studentsTableBody.appendChild(row)
  })
}

chgSrClass.addEventListener("change", changClass)

btnSearch.addEventListener("click", (e) => {
  e.preventDefault()
  setAtPage()
})

NumInp.addEventListener("keydown", (e) => {
 if(e.key === "Enter"){
    e.preventDefault()
    setAtPage()
 }
  
})

NameInp.addEventListener("input",  (e) => {
 e.preventDefault()
 searchName()
})

</script>
