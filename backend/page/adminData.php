<?php

 if($mem_data) {
  $role = ["super_admin", "admin"];
  $roleCheck = in_array($mem_data->level, $role);
   if(!$roleCheck) {
   header("Location: ?page=admin&subpage=showData");
  } else {
   $queryUsers = "SELECT * FROM admin";
   $stmtUser = $conn->prepare($queryUsers);
   $stmtUser->execute();
  }
 } else {
  header("Location: ?page=login");
 }

?>
<style>
 body {
  overflow: auto;   
  background: rgb(33, 37, 41); ; 
 }
 .btnSucc {
  background: #22c55e;
 }
 .btnDang {
  background: #f43f5e;
 }
 .btnRe {
  background: #14b8a6;
 }
 a {
  text-decoration: none;
 }
 .form-control {
    width: 100%;
 }
 img {
    object-fit: cover; 
 }
 #userId {
    display: none; 
 }
</style>
<div class="head-body bg-dark " data-bs-theme="dark">
  <div class="app-content-header">
    <div class="container-fluid">
                    <div class="head-title d-flex  justify-content-between">
                        <div class="head-1 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><i class="fa-solid fa-user-tie"></i>&nbsp;<b>จัดการบัญชี</b></p>
                        </div>
                        <div class="head-2 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><a class="text-info" href="?page=admin&subpage=showData">home</a>&nbsp; / &nbsp;account</p>
                        </div>

                    </div>
    </div>
 
  <div class="my-2 on-table user-content">
    <div class="user-content-manager my-3 px-3">
          <button class="btn btnRe text-white mx-2"><i class="fa-sharp fa-solid fa-power-off"></i> รีเซ็ตผู้ใช้งานเป็น 1 </button>
     <button class="btn text-white btnSucc mx-2"><i class="fa-sharp fa-solid fa-user-plus"></i> เพิ่มผู้ใช้</button>
     <button class="btn btnDang text-white mx-2"><i class="fa-sharp fa-solid fa-timer"></i> เพิ่มเวลาของ session ทั้งหมด</button>
    </div>
    <table class="table table-striped table-hover table-bordered custom-border">
      <thead class="table-light font-weight-bold text-nowrap">
        <tr class="text-nowrap">
<th> # </th>
<th><i class="fa-regular fa-user-circle"></i> โปรไฟล์</th>
<th><i class="fa-regular fa-user-circle"></i> ชื่อผู้ใช้</th>
<th><i class="fa-regular fa-envelope"></i> อีเมล</th>
<th><i class="fa-regular fa-key"></i> E-PIN</th>
<th><i class="fa-regular fa-layer-group"></i> ระดับผู้ใช้</th>
<th><i class="fa-regular fa-circle-check"></i> สถานะ</th>
<th><i class="fa-regular fa-clock"></i> ขณะนี้</th>
<th><i class="fa-regular fa-unlock"></i> Access</th>
<th><i class="fa-regular fa-users"></i> UsersLimit</th>
<th><i class="fa-regular fa-gear"></i> ตั้งค่า</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
         <?php
          $countAdm = 1;
          while($dataAdminsTable = $stmtUser->fetch(PDO::FETCH_OBJ)) {
?>
        <tr>
          <td> <?=  $countAdm++; ?> </td>
          <td> 
          <img src="data:image/png;base64,<?= base64_encode($dataAdminsTable->profile); ?>" class="shadow rounded" width="50" height="40"> 
          </td>
          <td> <?=  $dataAdminsTable->username; ?> </td>
         <!-- <td> <?=  $dataAdminsTable->password; ?> </td> -->
          <td> <?=  $dataAdminsTable->email; ?> </td>
          <td> <?=  $dataAdminsTable->e_pin; ?> </td>
          <td> <?=  $dataAdminsTable->level; ?> </td>
          <td> <?=  $dataAdminsTable->status; ?> </td>
          <td> <?=  $dataAdminsTable->logmax; ?> </td>
          <td> <?=  $dataAdminsTable->access; ?> </td>
          <td> <?=  $dataAdminsTable->limitusr; ?> </td>
          <td>
            <button data-id="<?= $dataAdminsTable->id ?>" class="btn btnFormAdmin shadow btn-warning text-dark"><i class="fa-duotone fa-regular fa-pen-to-square"></i> แก้ไข</button>
            <button class="btn btn-danger shadow"><i class="fa-sharp fa-solid fa-trash"></i> ลบ</button>
          </td>
<?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</div>

<div id="popAdmin" class="pop-up-adm">
  <div class="pop-up-content-adm">
  <span class="close">
  <img src="" class="rounded" id="profile" width="50" height="40"> 
</span>
    <div class="pop-up-header-adm">
   <div class="pop-node-adm">
       <b>
           เปลี่ยนข้อมูลผู้ใช้
           
       </b>
       </div>
   <hr class="hr-sp">
    <div class="pop-up-data-1">
<div class="d-flex justify-content-between">
      <p>UserID
<b id="userInfo">มีอะไรผิดพลาด</b>
</p>
<b class="text-danger">
 เข้มงวด <i class="fa-solid fa-location-exclamation"></i> 
</b>
</div>
   <hr class="hr-sp">
    </div>
    </div>
        <div class="pop-up-body-adm" data-bs-theme="dark">
        <div class="pop-up-all-adm">
         
<form id="formPopAdmin" class="w-100 my-2">
 
  <div class="d-flex flex-column mb-3">
    <label>
      <i class="fa-sharp fa-solid fa-image"></i> Profile 
    </label>
  <div class="input-group">
   <input type="file" name="profile" class="form-control" placeholder="โปรไฟล์">
   </div>
  </div>
 <input type="number" name="userId" id="userId">
  <div class="d-flex flex-column w-100 mb-3">
    <div class="d-flex justify-content-between gap-3">
<div class="flex-grow-1">
    <label>
      <i class="fa-solid fa-user-tie"></i>
      Username
    </label>
    <div class="input-group">
      <input type="text" name="username" id="name" class="form-control" placeholder="ชื่อผู้ใช้">
    </div>
</div>

<div class="flex-grow-1">
    <label>
<i class="fa-solid fa-envelope"></i>
      Email
    </label>
    <div class="input-group">
      <input type="text" name="email" id="email" class="form-control" placeholder="อีเมล">
    </div>
</div>
    </div>
  </div>

  <div class="d-flex flex-column w-100 mb-3">
    <div class="d-flex justify-content-between gap-3">
<div class="flex-grow-1">
      <label>
      <i class="fa-solid fa-unlock"></i>
      ขณะนี้ใช้งาน <b class="text-danger">*</b>
    </label>
      <input type="text" name="logmax" id="logmax" class="form-control" placeholder="ใช้งานปัจจุบัน">
</div>

<div class="flex-grow-1">
      <label>
      <i class="fa-solid fa-key"></i>
      E-PIN <b class="text-danger">*</b>
    </label>
      <input type="text" min="0" max="99999" name="epin" class="form-control" placeholder="PIN-5 หลัก" id="epin" > 
</div>
    </div>
  </div>

  <div class="d-flex flex-column w-100 mb-3">
    <div class="d-flex justify-content-between gap-3">
<div class="flex-grow-1">
      <label>
      <i class="fa-solid fa-unlock"></i>
      Access
    </label>
      <input type="text" name="access" id="access" class="form-control" placeholder="ใส่เป็นจำนวนวินาที">
</div>

<div class="flex-grow-1">
      <label>
      <i class="fa-solid fa-users"></i>
      UserLimit
    </label>
      <input type="text" name="limit" id="limit" class="form-control" placeholder="จำกัดการเข้าซ้อน">
</div>
    </div>
  </div>

<div class="d-flex flex-column w-100 mb-3">
  <div class="d-flex justify-content-between gap-3">
    <div class="flex-grow-1">
      <label>
       <i class="fa-solid fa-layer-group"></i> Role  

</label>
      <select class="form-control" name="level" id="level">
        <option value="visitor">visitor</option>
        <option value="admin">admin</option>
        <option value="super_admin">super_admin</option>
      </select>
    </div>
    <div class="flex-grow-1">
      <label><i class="fa-solid fa-layer-group"></i> 
Status 
</label>
      <select class="form-control" name="status" id="status">
        <option value="on">on</option>
        <option value="off">off</option>
        <option value="ban">ban</option>
      </select>
    </div>
  </div>
</div>

  <div class="d-flex flex-column w-100">
    <label>
      <i class="fa-sharp fa-solid fa-key"></i> Password 
    </label>
  <div class="input-group">
   <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน">
  <span id="coverSee" class="input-group-text">
    <i class="bi bi-eye-fill" id="see"></i>
    <i class="bi bi-eye-slash-fill" id="noSee"></i> 
  </span> 
   </div>
  </div>

</form>
        </div>
    </div>
            <div class="pop-up-footer-adm">
            <button class="btn-ac"id="accept-adm">
           <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>  บันทึกการเปลี่ยน
</button>
            <button class="btn-cl" id="close-adm">
           <i class="fa-regular fa-circle-xmark"></i>  ยกเลิกเปลี่ยนแปลง
</button>
    </div>
  </div> 
</div>
 
<script>
const popAcceptAdm = document.querySelector("#accept-adm")
const popAdmin = document.querySelector("#popAdmin") 
const popCancelAdm = document.querySelector("#close-adm")
const openFormAdmins = document.querySelectorAll(".btnFormAdmin")
let formName = document.querySelector("#name")
let formEmail = document.querySelector("#email")
let formLogmax = document.querySelector("#logmax")
let formEpin = document.querySelector("#epin")
let formAccess = document.querySelector("#access")
let formLimit = document.querySelector("#limit")
let formLevel = document.querySelector("#level")
let formStatus = document.querySelector("#status")
let iconP = document.querySelector("#profile")
let formId = document.querySelector("#userId")

const checkSee = document.querySelector("#coverSee")
const see = document.querySelector("#see")
const noSee = document.querySelector("#noSee")
const pwd = document.querySelector(`[name="password"]`)

checkSee.addEventListener("click", () => {
 if(pwd.type === "password") {
  pwd.type = "text"
  see.style.display = "none"
  noSee.style.display = "block"
  console.log("pwd")
 } else {
  pwd.type = "password"
  see.style.display = "block"
  noSee.style.display = "none"
  console.log("not found pwd")
 }
})


openFormAdmins.forEach((button) => {
    button.addEventListener("click", () => {
        let dataId = button.getAttribute("data-id")
        let userInfo = document.querySelector("#userInfo")
        userInfo.innerHTML = dataId
        popAdmin.style.opacity = "1"
        popAdmin.style.visibility = "visible"
        console.log(true)
        const getDataUser = async () => {
            const getApiUsr = "api/backend/getUserData.php"
            try {
            const resdataUsr = await fetch(getApiUsr, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        userId: dataId
                    })
                })
            const userData = await resdataUsr.json()
            if (userData.RESstatus === true) {
                formName.value = userData.username
                formEmail.value = userData.email
                formLogmax.value = userData.logmax
                if (userData.epin) {
                formEpin.value = userData.epin;
                } else {
                formEpin.placeholder = "ไม่มีคำขอขณะนี้";
                }
                formAccess.value = userData.access
                formLimit.value = userData.limitusr 
                formLevel.value = userData.level
                formStatus.value = userData.status
                formId.value = userData.id
                iconP.setAttribute("src", `data:image/png;base64,${userData.profile}`)
                console.log(" fetchAPI successfully ")
                console.log(formStatus.value)
                }
            } catch (err) {
                console.log(err)
            }
        }
        getDataUser()
    })
})

popCancelAdm.addEventListener("click", () => {
    popAdmin.style.opacity = "0"
    popAdmin.style.visibility = "hidden"
})

popAcceptAdm.addEventListener("click", async () => {
    const form = document.querySelector("#formPopAdmin")
    const formChangeAdmin = new FormData(form)

    try {
        const api = "api/backend/formAdmin.php"
        const resFormAdmin = await fetch(api, {
            method: "POST", 
            body: formChangeAdmin
        })
        const dataFormAdmin = await resFormAdmin.json()
        if (dataFormAdmin.RESstatus === true) {
            succto(dataFormAdmin.message)
            exUsername.value = dataFormAdmin.updateUser.username
            newUsername.innerHTML = dataFormAdmin.updateUser.username
        } else if(dataFormAdmin.RESstatus === "warning") {
            warnto(dataFormAdmin.message)
        } else {
            errto(dataFormAdmin.message)
        }
    } catch (error) {
        console.error("failed", error)
    }
})
</script>