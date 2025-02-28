<style>
* {
  user-select: none;
}

a {
  text-decoration: none;
}

.fa-screwdriver-wrench {
  color: green;
}
 .ptext {
 overflow: auto;
 }

.profile-data img {
  margin: 25px 0px;
  width: 130px;
  height: 120px;
  border-radius: 60px;
  box-shadow: 0 0 6px 5px #000;
  object-fit:  cover;
}

.reset-body {
  max-width: 940px;
}

.reset-body .reset-form {
  max-width: 920px;
  margin: 0 auto;
}

.reset-body .reset-form form {
  margin: 15px auto;
  max-width: 700px;
  width: auto;
  white-space: nowrap;
  padding: 4px 15px;
}

.reset-body .reset-form form .con-new {
  color: #a855f7;
}

.reset-body .reset-form form .oldPwd:focus {
  color: red;
  filter: drop-shadow(0 0 0.30rem black) contrast(120%);
}

.reset-head b {
  font-size: 25px;
}

.b {
  letter-spacing: 2px;
}

.btn-con {
  background: #0d9488;
  border-radius: 5px;
  border: 1px solid #0d9488;
  outline: none;
  padding: 7px 4px;
  width: 100%;
  transition: background 0.3s ease-in-out;
}

.btn-con:hover {
  border: 1px solid #0d9488;
  background: transparent;
}

.percent {}

.strg {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
  background-repeat: no-repeat;
  background: #94a3b8;
  transition: background-size 0.5s ease-in-out;
  outline: none;
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
}

.strg .strg-danger {
  width: 10%;
  background: linear-gradient(to right, #e11d48 0%, #FF4D4D 100%);
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-red {
  width: 20%;
  background: linear-gradient(to right, #e11d48 0%, #FF4D4D 100%);
  border-top-left-radius: 2px;
  border-bottom-left-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-orange {
  width: 40%;
  background: linear-gradient(to right, #dc2626 0%, #FF944D 100%);
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-harf-orange {
  width: 50%;
  background: linear-gradient(to right, #dc2626 0%, #FF944D 50%, #FFFF00 100%);
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-yellow {
  width: 60%;
  background: linear-gradient(to right, #ea580c 0%, #FFD54D 100%);
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-harf-green {
  width: 70%;
  background: linear-gradient(to right, #FF944D 0%, #6ee7b7 100%);
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-green {
  width: 80%;
  background: linear-gradient(to right, #6ee7b7 0%, #A8FF4D 100%);
  border-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-blue {
  width: 100%;
  background: linear-gradient(to right, #6ee7b7 0%, #4DD4FF 100%);
  border-top-right-radius: 2px;
  border-bottom-right-radius: 2px;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

.strg .strg-gray {
  width: 0%;
  height: 14px;
  border: 1px solid #000;
  display: none;
}

#oldpassno {
  display: none;
}

#noNew {
  display: none;
}

#noCon {
  display: none;
}

#text-tap {
  color: gray;
}

@keyframes color-wip {
  0% {
    box-shadow: 0 0 3px 2px #38bdf8;
  }
  100% {
    box-shadow: 0 0 6px 2px #38bdf8;
  }
}

@keyframes fadeIn {
  0% {
    box-shadow: 0 0 6px 2px #38bdf8;
  }
  100% {
    box-shadow: 0 0 3px 2px #38bdf8;
  }
}
</style>
           <div class="head-body bg-dark " data-bs-theme="dark">
             <div class="app-content-header">
                <div class="container-fluid">
                    <div class="head-title d-flex  justify-content-between">
                        <div class="head-1 bg-dark">
       <p class="mb-0 text-light sh-no-text"><i class="fa-solid fa-user-tie"></i>&nbsp;<b>Reset</b></p>
                        </div>
                        <div class="head-2 ptext bg-dark">
       <p class="mb-0 text-light sh-p"><a class="text-info" href="?page=admin&subpage=showData">home</a>&nbsp; > &nbsp;<a href="?page=admin&subpage=profile" class="text-info">
        profile
       </a>&nbsp;>&nbsp;reset</p>
                        </div>

                    </div>
</div>
</div>

  <div class="py-2 mx-3 px-3 bg-dark my-2 shadow text-light d-flex justify-content-between">
  <b>
   <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
Manage Password - จัดการรหัสผ่าน
</b>
 <b><i class="fa-solid fa-circle-info"></i></b>

</div>

 <div class="reset-body container">
  <div class="reset-head text-center mx-4 my-2">
   <div class="profile-data text-light text-center">
 <img id="prf" src="data:image/png;base64,<?php echo base64_encode($mem_data->profile); ?>" alt="Profile Image" >
</div>
   <b class="text-light b">
<i class="fa-sharp fa-solid fa-unlock"></i>
Reset Password
</b>
<p class="text-secondary">เปลี่ยนรหัสผ่านของคุณ</p>
  </div>
<div class="reset-form">
 <form id="formData" class="text-light">
  
<div class="my-3">
  <label><i class="fa-sharp fa-solid fa-key"></i> 
    รหัสผ่านเก่า
  </label>
 <div class="input-group">
  <input type="password" name="pwdOld" placeholder="Old password" class="oldPwd form-control" id="Oldpassword">
  <span id="typeCheckOld" class="input-group-text">
    <i class="bi bi-eye-fill" id="oldpassshow"></i>
    <i class="bi bi-eye-slash-fill" id="oldpassno"></i>
  </span>
</div>
</div>

<div class="my-3">
    <label><i class="fa-solid fa-key-skeleton"></i> รหัสผ่านใหม่</label>
    <div class="input-group">
        <input type="password" name="pwdNew" placeholder="New password" class="con-new form-control" id="inpNew">
        <span id="btnCheckNew" class="input-group-text">
            <i class="bi bi-eye-fill" id="new"></i>
            <i class="bi bi-eye-slash-fill" id="noNew"></i>
        </span>
    </div>
</div>

  <div class="my-3">
   <label><i class="fa-solid fa-key-skeleton"></i> ยืนยันรหัสผ่านใหม่</label>
 <div class="input-group">
    <input type="password" name="pwdCon" placeholder="Confirm new password" class="con-new form-control" id="inpCon">
  <span id="btnCheckCon" class="input-group-text">
    <i class="bi bi-eye-fill" id="con"></i>
    <i class="bi bi-eye-slash-fill" id="noCon"></i> 
  </span> 
 </div>
  </div>

  <div class="mt-3 mb-2">
   <label class="d-flex justify-content-between"> 
    <b>
<i class="fa-sharp fa-solid fa-shield-halved"></i>    ระดับ: <span id="text-tap"> รหัสผ่านว่างเปล่า </span>
    </b>
   <div class="percent">
<b id="percent">0</b>
<b>%</b>
</div>
   </label>
    <div class="strg" id="strg">
    <div id="strg-danger" class="strg-danger"></div>
    <div id="strg-red" class="strg-red"></div>
    <div id="strg-orange" class="strg-orange"></div>
    <div id="strg-harf-orange" class="strg-harf-orange"></div>
    <div id="strg-yellow" class="strg-yellow"></div>
    <div id="strg-green" class="strg-green"></div>
    <div id="strg-harf-green" class="strg-harf-green"></div>
    <div id="strg-blue" class="strg-blue"></div>
    <div id="strg-gray" class="strg-gray"></div>
   </div>
  </div>

  <div>
   <button type="button" id="btnReq" class="btn-con mt-3 mb-5">
    <i class="fa-solid fa-floppy-disk-circle-arrow-right"></i>
ยืนยันการเปลี่ยน
</button>
  </div>

 </form>
</div>
 </div>
</div>

<script src="assets/js/tappwd.js"></script>
<script src="assets/js/eyesPWD.js"></script>
<script>

const btn = document.querySelector("#btnReq")
const reqPwd = async () => {
  const form = document.querySelector("#formData")
  const api = "api/backend/changePWD.php"
  const fd = new FormData(form)
  const fdC = fd.get("pwdCon").trim() 
  const fdN = fd.get("pwdNew").trim()
  if (!fdN || !fdC) {
      errto("ว่างเปล่า")
      return
  } else {
       try {
        const res = await fetch(api, {
        method: "POST",
        body: fd
      })

      if (!res.ok) {
        throw new Error("!response.ok")
      }

      const data = await res.json()
      console.log(data)
      if(data.status === true) {
       succto(data.messg)
      } else if(data.status === false){
       errto(data.messg)
      } else {
       errto("Unknown Error")
      }
    } catch (error) {
      console.log("failed: ", error)
    }
  }
}

btn.addEventListener("click", (e) => {
    e.preventDefault()
    reqPwd()
})

</script>