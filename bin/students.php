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
   