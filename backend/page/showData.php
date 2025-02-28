<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="mb-0 text-white h-text shadow">
                    <i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;<b>จัดการหลังบ้าน</b>
                </h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-black text-white">
                    <span class="info-box-icon text-bg-primary shadow-sm">
                        <i class="fa-sharp fa-solid fa-calendar-days"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">เข้าสู่ระบบล่าสุด</span>
                        <span class="info-box-number"><?php echo date('Y-m-d'); ?><small></small></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-black text-white">
                    <span class="info-box-icon text-bg-danger shadow-sm">
                        <i class="fa-sharp fa-solid fa-alarm-clock"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">มาสายทั้งหมด</span>
                        <span class="info-box-number"><?php $router->allData("late_students",$conn) ?>&nbsp;<b>คน</b></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-black text-white">
                    <span class="info-box-icon text-bg-success shadow-sm">
                        <i class="fa-sharp fa-solid fa-users"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">นักเรียนทั้งหมด</span>
                        <span class="info-box-number"><?php echo $router->allData("mytable",$conn); ?>&nbsp;<b>คน</b></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box ss bg-black text-white">
                    <span class="info-box-icon text-bg-secondary shadow-sm">
                        <i class="fa-solid fa-reply-clock"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">เซสชันจะหมดใน</span>
                        <span class="info-box-number">
                            <?php 
date_default_timezone_set('Asia/Bangkok');
                                echo date("H:i", $_SESSION["exp"]) . "&nbsp;";
                                
                            ?>
<span id="expSs"></span>
                           <b>min</b>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <style>
            * {
                user-select: none;
            }

            .shadow {
                filter: drop-shadow(0 0 0.30rem black) contrast(150%);
            } 

            .info-box {
                filter: drop-shadow(0 0 0.40rem black) contrast(100%);
            }

            .ss {
                white-space: nowrap;
            }
            .txt {
                display: block;
                position: relative;
                padding: 10px;
                font-size: 16px;
                color: #5d9cec;
                font-weight: bold;
                letter-spacing: 1px;
            }
            .txt::before,
            .txt::after {
                content: "";
                position: absolute;
                top: 50%;
                width: 30%;
                border-top: 1px solid #fff;
               
            }
            .txt::before {
                left: 0;
                margin-left: -35%;
            }
            .txt::after {
                right: 0;
                margin-right: -35%;
            }

            .txt-2 {
                display: block;
                position: relative;
                font-weight: bold;
                letter-spacing: 1px;
            }
            .txt-2::before,
            .txt-2::after {
                content: "";
                position: absolute;
                top: 50%;
                width: 30%;
                border-top: 1px solid #fff;
               
            }
            .txt-2::before {
                left: 0;
                margin-left: -35%;
            }
            .txt-2::after {
                right: 0;
                margin-right: -35%;
            }
            .dt img {
                width: 200px;
                height: 120px;
                margin-right: 6px;
                margin-left: 6px;
                filter: drop-shadow(0 0 0.60rem black) contrast(200%) ;/*crimson*/
            }    
            .dt img:hover {
                filter: contrast(200%) 
                grayscale(80%);
            }
            .dev-by {
             /*white-space: nowrap;*/
             overflow: auto;
            }
        </style>

        <div class="bg-dark text-light px-2 py-2 rounded d-flex align-items-center flex-column">
            <b class="txt">
                <i class="fa-solid fa-circle-info"></i> &nbsp;Website Info
            </b>

            <div class="description align-self-start my-2 px-2">
                <p>
                    <i class="fa-sharp fa-solid fa-bell"></i>&nbsp;อัปเดตล่าสุด: 29/12/2567
                </p>
                <p>
                    <i class="fa-sharp fa-solid fa-calendar-lines-pen"></i>&nbsp;พัฒนาด้วย: HTML, CSS, JavaScript, PDO
                </p>
                <p>
                    <i class="fa-sharp fa-solid fa-calendar-lines-pen"></i>&nbsp;Libaries/CSS Framework: 
Bootstap, sweetAlert2,  Fontawesome(Pro), Toastr
                </p>
            </div>
 <div class="bg-secondary px-3 ass text-light rounded d-flex align-items-center flex-column w-100">
  <b class="txt-2 mb-3">Database/Tools</b>
<div class="align-self-start dt">
 <p>
  <i class="fa-sharp-duotone fa-thin fa-database"></i> &nbsp;Mysql and Other ...
</p>
 <img src="assets/img/mysql.png" class="rounded mb-3" alt="loading...">
 <img src="assets/img/serveo.png" class="rounded mb-3" alt="loading...">
 <img src="assets/img/phpmyadmin.png" class="rounded mb-3" alt="loading...">
 <img src="assets/img/ubuntu.png" class="rounded mb-3" alt="loading...">
</div>
 </div>
        </div>
<div class="bg-dark text-light px-2 py-2 rounded my-3">
 <div class="d-flex flex-column align-items-center">
             <b class="txt">
                <i class="fa-solid fa-circle-info"></i> &nbsp;Developed by 
            </b>
 </div>
<div class="px-3 dev-by">
 
  <div class="d-flex justify-content-between">
    <div class="d-flex flex-column">
      <p><i class="fa-sharp fa-solid fa-circle-user"></i> นายชัยมงคล หารบุรุษ</p>
      <p class="ms-3">- Fontend</p>
      <p class="ms-3">- Backend</p>
    </div>
    <p>มัธยมศึกษาปีที่ 4/3</p>
  </div>

  <div class="d-flex justify-content-between">
    <div class="d-flex flex-column">
      <p><i class="fa-sharp fa-solid fa-circle-user"></i> นายวีริศ มีมุข</p>
      <p class="ms-3">- Fontend</p>
    </div>
    <p>มัธยมศึกษาปีที่ 4/3</p>
  </div>

</div>
</div>
    </div>
</div>

<script>
let expElement = document.querySelector("#expSs")

setInterval(() => {
  let remainingTime = <?php echo $_SESSION["exp"]; ?> - Date.now() / 1000;
  let minutes = Math.floor(remainingTime / 60)
  let seconds = Math.floor(remainingTime % 60)
  
  expElement.innerHTML = `${minutes}:${seconds.toString().padStart(2, "0")}`
}, 1000)
</script>