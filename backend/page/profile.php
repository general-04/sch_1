<style>
 * {
  user-select: none;
 }
 .fa-screwdriver-wrench {
  color: green; 
 }
 .head-body {
  box-shadow: 0 -2px 6px 5px #000;
 }
 a {
  text-decoration: none;
 }
  .co-c {
   color: #22c55e;
  }
 .profile-data img {
   margin: 25px 0px; 
   width: 140px;
   height: 130px;
   border-radius: 100%;
   box-shadow: 0 0 6px 5px #000;
   object-fit: cover;
 } 
 .profile-inp {
  margin: 15px auto;
  max-width: 920px;
  width: auto;
  white-space: nowrap;
  padding: 4px 5px;
  /*background: red; */
  .inp-d {
   text-align: left;
   width: 100%;
   background: #404040; 
   color: #fff;
  }
 } 
 .dm {
  margin-top: 20px;
 }
 .mb2 {
  margin-bottom: 20px;
 }
 .grn {
  background: #10b981; 
  color: #fff;
  outline: none;
  border: 1px solid #22c55e;
  border-radius: 5px;
  padding: 7px 2px;
 }
 .grn:hover {
  background: transparent; 
  outline: none;
  border: 1px solid #22c55e;
  color: #fff;
 }
 .brn {
  background: #4f46e5;  
  color: #fff;
  outline: none;
  border: 1px solid #4f46e5;
  border-radius: 5px;
  padding: 7px 2px;
 }
 .brn:hover {
  outline: none;
  background: transparent; 
  border: 1px solid #3b82f6;
  color: #fff;
 }
 .max-brn {
  background: black;
  display: flex;
  justify-content: center;
  text-align: center;
  border-radius: 5px;
 }
  .fa-satellite-dish {
   color: #22c55e;
  }
  .fa-brake-warning {
   color: #e7e5e4; 
  }
  .fa-universal-access {
   color: #e7e5e4;
  }
  .fa-envelopes {
   color: #f97316;
  }
  .fa-circle-user{
   color: #e7e5e4;
  }
  .nb {
   position: relative; 
   text-align: center;
  }
  .ns {
   position: absolute;
   top: 50%;
   right: 0;
   transform: translate(0, -50%);
   margin-right: 20px;
   background: gray; 
   color: #fff;
   padding: 2px auto;
   border-radius: 6px;
   width: 50px;
   box-shadow: 0 0 4px 1px gray;
  }
  .select-body {
   margin: 60px 0px;
  }
  .select-body .choice {
  display: flex;
  flex-flow: column;
  justify-content: center;
  text-align: left;
  border-radius: 5px;
  background: #d1d5db; 
  padding: 2px 2px;
  width: auto;
  }
  .btn-ch {
  background: #f3f4f6;  
  outline: none;
  padding: 14px 15px;
  border: 2px solid #d1d5db;
  } 
  .mx-fn {
   width: 120px;
   text-align: center;
   font-weight: bold;
   box-shadow: 0 0 3px 2px #000;
  }
  .bg-gr {
   background: #10b981; 
  }
  .bg-re {
   background : #e11d48;
  }
  .bg-wa {
   background: #38bdf8; 
  }
  .selc {
  margin: 15px auto;
  max-width: 1240px;
  width: auto;
  white-space: nowrap;
  padding: 4px 5px;
  }
  .fa-rectangle-history-circle-user {
   color: #9333ea; 
  }
  .choice a {
  background: #f0f0f0; 
  transition: margin 0.2s ease-in;
  }
  .choice a:hover {
  background: transparent;
  margin: 5px 2px;
  }
</style>
           <div class="head-body bg-dark " data-bs-theme="dark">
             <div class="app-content-header">
                <div class="container-fluid">
                    <div class="head-title d-flex  justify-content-between">
                        <div class="head-1 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><i class="fa-solid fa-user-tie"></i>&nbsp;<b>Profile</b></p>
                        </div>
                        <div class="head-2 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap"><a class="text-info" href="?page=admin&subpage=showData">home</a>&nbsp; / &nbsp;profile</p>
                        </div>

                    </div>
</div>
</div>

<div class="profile-body">
  <div class="py-2 mx-3 px-3 bg-dark my-2 shadow text-light d-flex justify-content-between">
  <b>
   <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
Manage User - จัดการข้อมูลผู้ใช้
</b>
 <b><i class="fa-solid fa-circle-info"></i></b>

</div>
<div class="profile-data text-light text-center">
 <img id="prf" src="data:image/png;base64,<?php echo base64_encode($mem_data->profile); ?>" alt="Profile Image" >
</div>

<div class="profile-inp text-light">
 
<form id="FDprofile">
     <div class="mx-2 mb-4">
      <label class="mx-2">
<i class="fa-solid fa-image"></i> Profile (โปรไฟล์)</label>
      <input type="file" id="profile" name="profile" placeholder="" class="inp-d form-control" value="" >
    </div>
</form>


    <div class="mx-2 mb-4">
      <label class="mx-2">
<i class="fa-solid fa-image"></i> Profile (โปรไฟล์)</label>
      <input type="text" name="prf" placeholder="" class="inp-d form-control" value=
"<?php 

  if(isset($mem_data->profile) && !empty($mem_data->profile)){
   echo "คุณเคยอัพโหลดรูปแล้ว";
  } else {
   echo "คุณยังไม่อัพโหลดรูป";
  }

?>" 
readonly>
    </div>

<div class="d-flex flex-row">
 
  <div class="mx-2 flex-grow-1">
    <label class="mx-2"><i class="fa-sharp fa-solid fa-circle-user"></i> Username</label>
    <input type="text" class="inp-d form-control" id="username" value="<?php echo $mem_data->username; ?>" readonly>
  </div>

  <div class="mx-2 flex-grow-1">
    <label class="mx-2"><i class="fa-sharp fa-solid fa-envelopes"></i> Email</label>
    <input type="text" id="email" class="inp-d form-control" value="<?php echo $mem_data->email; ?>" readonly>
  </div>

</div>
<div class="d-flex flex-row dm">
 
  <div class="mx-2 flex-grow-1">
    <label class="mx-2"><i class="fa-solid fa-brake-warning"></i> Role</label>
    <input type="text" class="inp-d form-control" value="<?php echo $mem_data->level; ?>" readonly>
  </div>

  <div class="mx-2 flex-grow-1">
    <label class="mx-2"><i class="fa-solid fa-satellite-dish"></i> Status</label>
    <input type="text" class="inp-d form-control" value="<?php echo $mem_data->status; ?>" readonly>
  </div>

</div>

<div class="d-flex flex-row mt-3 mb-2">
    <div class="mx-2 mt-1 flex-grow-1">
      <label class="mx-2"><i class="fa-sharp fa-solid fa-universal-access"></i> Access (เซสชัน)</label>

<div class="nb">
      <input type="text" class="inp-d form-control" id="access" value="<?php echo round($mem_data->access/60); ?>" readonly>
 <span class="ns">นาที</span>
    </div>
</div>

<div class="mx-2 mt-1 flex-grow-1">
    <label class="mx-2"><i class="fa-sharp fa-solid fa-universal-access"></i> ขณะนี้ใช้งาน</label>

<div class="nb">
 <input type="text" class="co-c inp-d form-control n" value="<?php echo $mem_data->logmax; ?>" readonly>
 <span class="ns">คน</span>
</div>

</div>
</div>

<div class="mx-2 mt-4">
 <button id="btnPf" class="grn w-100"><i class="fa-solid fa-floppy-disk"></i> บันทึกข้อมูล</button>
</div>
<div class="mx-2 mt-3 mb-4 max-brn">
<!-- <a href="?page=admin&subpage=reset" class="brn w-100">
  <i class="fa-sharp fa-solid fa-unlock"></i> เปลี่ยนรหัสผ่าน
</a> -->
</div>

</div>

</div>
</div>

 
<div class="select-body">
   <div class="head-body selc bg-dark text-light rounded">
     <div>
      
<div class="
d-flex justify-content-between align-items-center text-center mx-3 bg- px-2 py-2 rounded
">
       <b class="float-none w-auto px-2 fs-5 text-light">
       <i class="fa-solid fa-user"></i> ข้อมูลส่วนตัว
</b>
 <b><i class="fa-solid fa-circle-info"></i></b>
</div>

<hr class="border-2">
<div class="mx-2 mt-3 mb-4 choice rounded">
 
<a href="#" class="text-dark btn-ch w-100 rounded" id="newNm">
  <div class="d-flex justify-content-between flex-row">
    <div>
      <i class="fa-regular fa-circle-user text-primary"></i> เปลี่ยนชื่อผู้ใช้งาน
    </div>
    <div class="bg-gr text-light px-2 rounded mx-fn">
      <strong>
 <i class="fa-solid fa-circle-check"></i> API ON
      </strong>
    </div>
  </div>
</a>

<a href="#" class="text-dark btn-ch w-100 rounded" id="newAc">
  <div class="d-flex justify-content-between flex-row">
    <div>
      <i class="fa-sharp fa-solid fa-timer text-danger"></i> ระยะเวลาเข้าใช้งาน
    </div>
    <div class="bg-gr text-light px-2 rounded mx-fn">
      <strong>
 <i class="fa-solid fa-circle-check"></i> API ON
      </strong>
    </div>
  </div>
</a> 

<a href="#" class="text-dark btn-ch w-100 rounded" id="btnLimit">
  <div class="d-flex justify-content-between flex-row">
    <div>
      <i class="fa-sharp fa-solid fa-universal-access text-secondary"></i> จำกัดการเข้าใช้บัญชี
    </div>
    <div class="bg-gr text-light px-2 rounded mx-fn">
      <strong>
 <i class="fa-solid fa-circle-check"></i> API ON
      </strong>
    </div>
  </div>
</a>

<a href="#" class="text-dark btn-ch w-100 rounded" id="btnEmail">
  <div class="d-flex justify-content-between flex-row">
    <div>
      <i class="fa-regular fa-envelopes"></i> เปลี่ยนอีเมล
    </div>
<div class="bg-gr text-light px-2 rounded mx-fn">
 <stong>
 <i class="fa-solid fa-circle-check"></i> API ON
 </stong>
</div>
  </div>
</a>

<a href="?page=admin&subpage=history" class="text-dark btn-ch w-100 rounded" id="btnEmail">
  <div class="d-flex justify-content-between flex-row">
    <div>
      <i class="fa-regular fa-rectangle-history-circle-user"></i> ประวัติการใช้งาน
    </div>
    <div class="bg-gr text-light px-2 rounded mx-fn">
      <strong>
 <i class="fa-solid fa-circle-check"></i> API ON
      </strong>
    </div>
  </div>
</a>

 <a href="?page=admin&subpage=reset" class="rounded text-dark btn-ch w-100">
<div class="d-flex justify-content-between flex-row">
 <div>
    <i class="fa-sharp fa-regular fa-key fa-beat-fade"></i> เปลี่ยนรหัสผ่าน
 </div>
<div class="bg-gr text-light px-2 rounded mx-fn">
 <stong>
 <i class="fa-solid fa-circle-check"></i> API ON
 </stong>
</div>
</div>
</a>

</div>
<hr class="border-2">

  </div>
  </div>
</div>


<!--Username-->
<div id="popName" class="pop-up-1">
  <div class="pop-up-content-1">
  <span class="close">
<i class="fa-solid fa-user-secret"></i>
</span>
    <div class="pop-up-header-1">
   <div class="pop-node-1"><b>เปลี่ยนชื่อผู้ใช้งาน</b></div>
   <hr class="hr-sp">
    <div class="pop-up-data-1">
<div class="d-flex justify-content-between">
      <p>ปัจจุบัน
<b id="newUsername"><?php echo $mem_data->username; ?></b>
</p>
<b class="text-danger">
 เข้มงวด <i class="fa-solid fa-location-exclamation"></i> 
</b>
</div>
   <hr class="hr-sp">
    </div>
    </div>
        <div class="pop-up-body-1" data-bs-theme="dark">
        <div class="pop-up-all-1">
         
<form id="formPopName" class="w-100 my-2">
  <div class="d-flex flex-column w-100 mb-3">
    <label>
      <i class="fa-solid fa-user-tie"></i>
      New username 
    </label>
    <div class="input-group">
      <span class="input-group-text">
       <?php echo $mem_data->level."_"; ?>
</span>
      <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้ใหม่">
    </div>
  </div>
  <div class="d-flex flex-column w-100">
    <label>
      <i class="fa-sharp fa-solid fa-key"></i> Confirm password 
    </label>
  <div class="input-group">
   <input type="password" name="confirm_password" class="form-control" placeholder="ยืนยันรหัสผ่าน">
  <span id="coverSee" class="input-group-text">
    <i class="bi bi-eye-fill" id="see"></i>
    <i class="bi bi-eye-slash-fill" id="noSee"></i> 
  </span> 
   </div>
  </div>
</form>
        </div>
    </div>
            <div class="pop-up-footer-1">
            <button class="btn-ac"id="accept-1">
           <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>  ยืนยัน
</button>
            <button class="btn-cl" id="close-1">
           <i class="fa-regular fa-circle-xmark"></i>  ยกเลิก
</button>
    </div>
  </div> 
</div>

<!--Access-->
<div id="popAccess" class="pop-up-2">
  <div class="pop-up-content-2">
  <span class="close"> 
<i class="fa-sharp fa-light fa-timer"></i>
</span>
    <div class="pop-up-header-2">
   <div class="pop-node-2"><b>ระยะเวลาใช้งาน</b></div>
   <hr class="hr-sp">
    <div class="pop-up-data-2">
<div class="d-flex justify-content-between">
      <p>ปัจจุบัน
<b id="newAccess"><?php echo round($mem_data->access/60); ?> นาที</b>
</p>
<b class="text-warning">
 ไม่เข้มงวด <i class="fa-solid fa-location-exclamation"></i> 
</b>
</div>
   <hr class="hr-sp">
    </div>
    </div>
        <div class="pop-up-body-2" data-bs-theme="dark">
        <div class="pop-up-all-2">
         
<form id="formPopAccess" class="w-100 my-2">
  <div class="d-flex flex-column w-100 mb-3">
   <label class="my-1">
   <i class="fa-sharp fa-light fa-timer fa-fade"></i> เปลี่ยนแปลงระยะเวลาของคุณ
</label> 
   <select name="timeAccess" class="form-control">
    <option value="3600">1 ชั่วโมง</option>
    <option value="5400">1 ชั่วโมง 30 นาที</option>
    <option value="7200">2 ชั่วโมง</option>
    <option value="9000">2 ชั่วโมง 30 นาที</option>
    <option value="10800">3 ชั่วโมง</option>
   </select>
  </div>
</form>
        </div>
    </div>
            <div class="pop-up-footer-2">
            <button class="btn-ac"id="accept-2">
           <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>  ยืนยัน
</button>
            <button class="btn-cl" id="close-2">
           <i class="fa-regular fa-circle-xmark"></i>  ยกเลิก
</button>
    </div>
  </div> 
</div>

<!--limit-->
<div id="popLimit" class="pop-up-3">
  <div class="pop-up-content-3">
  <span class="close"> 
<i class="bi bi-universal-access text-info"></i>
</span>
    <div class="pop-up-header-3">
   <div class="pop-node-3"><b>จำกัดผู้ใช้งาน</b></div>
   <hr class="hr-sp">
    <div class="pop-up-data-3">
<div class="d-flex justify-content-between">
      <p>แถบอัปเดตข้อมูล
<b>? คน</b>
</p>
<b class="text-warning">
 ไม่เข้มงวด <i class="fa-solid fa-location-exclamation"></i> 
</b>
</div>
<div class="d-flex justify-content-evenly shadow bg-secondary text-light rounded">
 <b><?php echo $mem_data->limitusr; ?> คน</b>
 <b>
  <i class="fa-regular fa-arrow-right"></i>
 </b>
 <b id="newLimitShow">
  <i class="fa-duotone fa-solid fa-question fa-flip"></i>
 </b>
</div>
   <hr class="hr-sp">
    </div>
    </div>
        <div class="pop-up-body-3" data-bs-theme="dark">
        <div class="pop-up-all-3">
         
<form id="formPopLimit" class="w-100 my-2">
  <div class="d-flex flex-column w-100 mb-3">
   <label class="my-1">
   <i class="fa-sharp-duotone fa-regular fa-universal-access fa-fade"></i> จำกัดการเข้าถึงบัญชี
</label> 
   <select name="limitUsr" class="form-control">
    <option value="1">1 คน</option>
    <option value="2">2 คน</option>
    <option value="3">3 คน</option>
    <option value="4">4 คน</option>
    <option value="5">5 คน</option>
   </select>
  </div>
</form>
        </div>
    </div>
            <div class="pop-up-footer-3">
            <button class="btn-ac"id="accept-3">
           <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>  ยืนยัน
</button>
            <button class="btn-cl" id="close-3">
           <i class="fa-regular fa-circle-xmark"></i>  ยกเลิก
</button>
    </div>
  </div> 
</div>

<!--Email-->
<div id="popEmail" class="pop-up-4">
  <div class="pop-up-content-4">
  <span class="close">
 <i class="fa-sharp fa-solid fa-envelope"></i>
</span>
    <div class="pop-up-header-4">
   <div class="pop-node-4"><b>เปลี่ยนอีเมลผู้ใช้งาน</b></div>
   <hr class="hr-sp">
    <div class="pop-up-data-4">
<div class="d-flex justify-content-between">
      <p>แถบอัปเดต
<b>ข้อมูล</b>
</p>
<b class="text-danger">
 เข้มงวด <i class="fa-solid fa-location-exclamation"></i> 
</b>
</div>
<div class="bg-secondary rounded px-2 py-1 text-center">
 <b id="newEmail"><?php echo $mem_data->email; ?> </b>
</div>
   <hr class="hr-sp">
    </div>
    </div>
        <div class="pop-up-body-4" data-bs-theme="dark">
        <div class="pop-up-all-4">
         
<form id="formPopEmail" class="w-100 my-2">
  <div class="d-flex flex-column w-100 mb-3">
    <label>
      <i class="fa-solid fa-user-tie"></i>
      New email 
    </label>
    <div class="input-group">
      <span class="input-group-text">
       <i class="fa-sharp fa-solid fa-envelopes"></i>
</span>
      <input type="email" name="email" class="form-control" placeholder="อีเมลใหม่">
    </div>
  </div>
  <div class="d-flex flex-column w-100">
    <label>
      <i class="fa-sharp fa-solid fa-key"></i> Confirm password 
    </label>
  <div class="input-group">
   <input type="password" name="confirm_password2" class="form-control" placeholder="ยืนยันรหัสผ่าน">
  <span id="coverSee2" class="input-group-text">
    <i class="bi bi-eye-fill" id="see2"></i>
    <i class="bi bi-eye-slash-fill" id="noSee2"></i> 
  </span> 
   </div>
  </div>
</form>
        </div>
    </div>
            <div class="pop-up-footer-4">
            <button class="btn-ac"id="accept-4">
           <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>  ยืนยัน
</button>
            <button class="btn-cl" id="close-4">
           <i class="fa-regular fa-circle-xmark"></i>  ยกเลิก
</button>
    </div>
  </div> 
</div>

<script>

 const updatePf = document.querySelector("#FDprofile")
 const btnPf = document.querySelector("#btnPf")
 const prf = document.querySelector("#prf")

 const allTagA = document.querySelectorAll("a")

 allTagA.forEach(link => {
  link.addEventListener('mousedown', (e) => {
    e.preventDefault()
  })

  link.addEventListener("contextmenu", (e) => {
    e.preventDefault()
  })
})

btnPf.addEventListener("click", async (e) => {
  e.preventDefault()

  const fd = new FormData(updatePf)
  const valuePf = fd.get("profile")
  console.log(valuePf)

  try {
    const api = "api/backend/saveProfile.php"
    const res = await fetch(api, {
      method: "POST",
      body: fd
    })

    if (!res.ok) {
      const messgErr = await res.json()
      throw new Error(`status: ${res.status} message: ${messgErr}`)
    }

    const data = await res.json()
     if(data.status === true) {
      succto(data.messg)
      prf.setAttribute("src", `data:image/png;base64,${data.record.img}`)
      console.log("response:", data)
     } else {
      errto(data.messg)
      console.log("failed:", data)
     }
  } catch (error) {
    console.log("resfail:", error)
  }
})

</script>