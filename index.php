<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta property="og:image" content="assets/img/bsjlogo.png">
  <meta property="og:title" content="Student lateness record">
  <meta name="description" content="บันทึกการมาสาย เฉพาะนักเรียนโรงเรียนบ้านสวนจั่นอนุสรณ์">
  <meta name="theme-color" content="#000">
  <title>บันทึกการมาสาย</title>
  <link rel="icon" type="image/png" href="assets/img/bsjlogo.png">
  <link rel="manifest" href="manifest.json">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://kit-pro.fontawesome.com/releases/v6.3.0/css/pro.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai+Looped:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
</head>

<body class="bg-dark">
<div class="container d-flex justify-content-center">
    <div class="main">
        <form id="FormData">
            <section>
                <div class="mb-3">
                    <div class="crop bg-dark">
                        <h4>ระบุบรายชื่อคนมาสาย</h4>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="form-group my-2 col-12">
                    <label class="mb-2" for="studentid">
                        <i class="fa-duotone fa-circle-user"></i
                        >&nbsp;รหัสนักเรียน
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="stId"
                        name="stId"
                        placeholder="StudentID"
                        min="20000"
                        max="30000"
                    />
                </div>
                <div class="gr-btn my-2">
                    <button type="button" class="btn-c" id="conf">
                        <i class="fa-solid fa-folder-user"></i>&nbsp;บันทึก
                    </button>
                    <button type="button" class="btn-t" id="cont">
                        <i class="fa-sharp-duotone fa-solid fa-table"></i
                        >&nbsp;สลับ
                    </button>
                    <details class="open-footer btn-primary btn">
                        <summary>ผู้พัฒนา</summary>
                        <footer class="footer-navtive">
                            <div class="f-content">
                                <div class="f-head">พัฒนา</div>
                                <div class="f-by-dev dev1">
                                    นายชัยมงคล หารบุรุษ 4/3
                                </div>
                                <div class="f-by-dev dev2">
                                    นายวีริศ มีมุข 4/3
                                </div>
                                <div class="f-last">
                                    แจ้งปัญา &nbsp;<a
                                        href="https://line.me/ti/p/tk8Ln1jZTz"
                                        >ได้ที่</a
                                    >
                                </div>
                            </div>
                        </footer>
                    </details>
                </div>
            </div>
        </form>
        <div class="table-check my-4">
            <div class="table-title">
                <b
                    ><i class="fa-solid fa-calendar-clock"></i> ตารางบันทึกผล
                    วันนี้</b
                >
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="">
                        <tr>
                            <th>ชื่อ</th>
                            <th>ชั้น</th>
                            <th>มาสาย</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr id="tTr"></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="showDataRealTime my-4">
            <div class="show-head">
                <h4>
                    Student information
                    <i class="fa-duotone fa-solid fa-user-magnifying-glass"></i>
                </h4>
            </div>
            <div class="show-body">
                <div class="show-body-user-data row">
                    <div class="show-name my-3 col-6">
                        <label>
                            <i class="fa-duotone fa-circle-user"></i
                            >&nbsp;ชื่อนักเรียน</label
                        >
                        <input
                            type="text"
                            name="name"
                            value="Undefined"
                            id="studentName"
                            class="form-control"
                            disabled
                        />
                    </div>
                    <div class="show-section my-3 col-6">
                        <label
                            ><i class="fa-duotone fa-circle-chevron-right"></i
                            >&nbsp;ชั้นนักเรียน</label
                        >
                        <input
                            type="text"
                            name="name"
                            value="Undefined"
                            id="studentClass"
                            class="form-control"
                            disabled
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      <script type="module">
         import { ErrorNum, SuccessMessage, ErrorMessage, WarningMessage, successConfirm, showDataTable } from './assets/js/resultFunc.js'
         const FormDataElement = document.querySelector("#FormData")
         const studentID = document.querySelector("#stId")
         const btnForm = document.querySelector("#conf")
         const btnC = document.querySelector("#cont")
         const table = document.querySelector(".table-check")
         const showDatar = document.querySelector(".showDataRealTime")
         btnC.addEventListener("click",() => {
          if(table.style.display === "block"){
           table.style.display = "none"
           showDatar.style.display = "block"
          } else {
           table.style.display = "block"
           showDatar.style.display = "none"
          }
         })
         
const recordApi = async () => {
     const fd = new FormData(FormDataElement)
     const api = "api/verify.php"
     const checkStid = fd.get("stId").trim()
      if(!checkStid){
        WarningMessage()
        return
      } else {
      try{
       const response = await fetch(api, {
        method: "POST",
        body: fd
      })
      const data = await response.json()
      if(data.status === true){
         SuccessMessage()
         showDataTable(
             data.id,
             data.id.uid,
             data.id.name,
             data.id.class,
             data.id.late,
             data.id.date
            )
      } else if(data.status == false && data.message === "No data found") {
             ErrorMessage()
            } else if (data.status == false && data.message === "Wrong data"){
             ErrorNum()
            } else {
             WarningMessage()
            }
      } catch (error){
        console.log("Error", error)
      }
   }
}


btnForm.addEventListener("click", (e) => {
   e.preventDefault()
   recordApi()
  })
FormDataElement.addEventListener("keydown", (e) => {
   if(e.key === "Enter"){ 
       e.preventDefault()
       recordApi()
   }
  })
      </script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      <script src="assets/js/showData.js"></script>

     <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
   
</body>

</html>