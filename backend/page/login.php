<?php require('assets/css/page/style.css.php'); ?>
<?php
  if(isset($_SESSION["member_id"]) && isset($_SESSION["exp"])){
   header("Location: ?page=admin&subpage=showData");
   exit();
  }
?>
<style>
 .bi-eye-slash-fill {
  display: none;
 }
</style>

<div class="video-background">
    <video autoplay muted loop class="bg-video">
        <source src="assets/img/bg.mp4" type="video/mp4">
    </video>
</div>

      <div class="container d-flex justify-content-center">
         <div class="row mt-5 adminForm">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header text-center">
                   <div>
                   </div>
<div>
                       <img src="assets/img/user.png" alt="loading" id="profile"> 
</div>
                     <b>Login for admin or visitor only</b>
                     <div>
                     </div>
                  </div>
                  <div class="card-body">
  <form id="adminForm">
                        <div class="mb-3">
                           <div class="input-group">
                              <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                              <input type="text" class="form-control rounded" id="username" name="username" placeholder="ชื่อผู้ใช้">
                           </div>
                        </div>
                        <div class="mb-3">
                           <div class="input-group">
                              <span class="input-group-text"><i class="fa-duotone fa-lock-keyhole"></i></span>
                              <input type="password" class="form-control rounded" id="password" name="password" placeholder="รหัสผ่าน">
<span id="typeCheck" class="input-group-text rounded">
<i class="bi bi-eye-fill" id="showPass"></i>
<i class="bi bi-eye-slash-fill" id="noPass"></i>
</span>
                           </div>
                        </div>
                        <div class="text-center ">
                           <button type="button" class="btn btn-primary my-2" id="btnAD"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;เข้าสู่ระบบ</button>
                           <button type="button" class="btn btn-secondary" id="btnFG"><i class="fa-solid fa-circle-exclamation"></i>&nbsp;ลืมรหัส?</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div> 
         </div>
      </div>

<script src="assets/js/showProfile.js"></script>
<script type="module">

import { ErrorMs, SuccessMessage, ErrorMessage, WarningMessage, ErrorMth, ErrorLimit } from './assets/js/alert.js'
const btnLog = document.querySelector("#btnAD");
const pwd = document.querySelector("#showPass");
const nopwd = document.querySelector("#noPass");
const inp = document.querySelector("#password");
const checkpwd = document.querySelector("#typeCheck");
const fdAdmin = document.querySelector("#formAdmin")

checkpwd.addEventListener("click", (e) => {
   e.preventDefault();
   if (inp.type === "password") {  
      inp.type = "text"; 
      pwd.style.display = "none";
      nopwd.style.display = "block";
   } else {
      inp.type = "password"; 
      nopwd.style.display = "none";
      pwd.style.display = "block";
   }
});

btnLog.addEventListener("click", async (e) => {
    e.preventDefault();
    const valueForm = document.querySelector("#adminForm");
    const api = "api/backend/check_login.php";
    const usernm = valueForm.querySelector("[name='username']")
    const passwd = valueForm.querySelector("[name='password']")
    const checked = usernm.value.trim() && passwd.value.trim()
    const Fdv = new FormData(valueForm);      
    if(!checked){
     WarningMessage()
     return
    } else {
     try{
    const response = await fetch(api, {
        method: "POST",
        body: Fdv
    });
    const data = await response.json();

        if(data.status === false && data.keyMs == "notFound"){
         ErrorMessage();
        } else if(data.status === false && data.keyMs == "empty") {
         WarningMessage();
        } else if(data.status === false && data.keyMs == "onlyPOST") {
         ErrorMth();
        } else if (data.status === false && data.keyMs == "maxUsers") {
         ErrorLimit(data.message)
        } else if(data.status === false && data.keyMs === "wrong") {
         ErrorMessage()
        }else if(data.status === true && data.message == "successfully") {
         SuccessMessage(data.name);
         console.log(data.dataSetss) 
        } else {
         WarningMessage();
        }
    } catch(error) {
     console.log("Error: ", error)
    }
  }
})

      </script>