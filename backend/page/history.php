<style>
 * {
  user-select: none;
 }
 a {
 text-decoration: none;
}
 .ptext {
 overflow: auto;
 }
</style>
           <div class="head-body bg-dark " data-bs-theme="dark">
             <div class="app-content-header">
                <div class="container-fluid">
                    <div class="head-title d-flex  justify-content-between">
                        <div class="head-1 bg-dark">
       <p class="mb-0 text-light sh-no-text text-nowrap">
       <i class="fa-duotone fa-regular fa-clock-rotate-left fa-fade"></i>
&nbsp;<b>History</b></p>
                        </div>
                        <div class="ptext head-2 bg-dark">
       <p class=" mb-0 text-light text-nowrap sh-p"><a class="text-info" href="?page=admin&subpage=showData">home</a>&nbsp; > <a class="text-info" href="?page=admin&subpage=profile">
        profile
       </a> > &nbsp;history</p>
                        </div>

                    </div>
</div>
</div>
  <div class="py-2 mx-3 px-3 bg-dark my-2 shadow text-light d-flex justify-content-between">
  <b>
<i class="fa-solid fa-map-location-dot text-primary"></i>
Access information - ข้อมูลเข้าใช้งาน
</b>
 <b><i class="fa-solid fa-circle-info"></i></b>

</div>
 <div class="container">
  <div class="
   d-flex text-light flex-column mt-2 p-3 rounded
">
   
<div class="bg-secondary shadow rounded py-2 px-4">
  <div class="mt-3 mb-1">
    <b>
     <i class="fa-solid fa-magnifying-glass"></i>
     IP Address
</b> 
    <div class="
text-center bg-info rounded p-1 w-50 text-secondary
" id="myIp"></div>
   </div>
 <div class="my-2">
    <b>Country</b>
    <div id="myCountry"></div>
</div>
 <div class="my-2">
    <b>City</b>
    <div id="myCity"></div>
</div>
 <div class="my-2">
    <b>User-Agent</b>
    <div id="myUserAgent"></div>
 </div>
 <div class="mt-2 mb-3">
    <b>Date</b>
    <div id="myDate"></div>
 </div>
 <div class="mt-1 mb-3">
    <b>TimeStamp</b>
    <div id="myTimeStamp"></div>
 </div>
</div>

  </div>
 </div>
</div>

<script>

 const ip = document.querySelector("#myIp")
 const country = document.querySelector("#myCountry")
 const city = document.querySelector("#myCity")
 const userAgent = document.querySelector("#myUserAgent")
 const date = document.querySelector("#myDate")
 const timeStamp = document.querySelector("#myTimeStamp")

 const myHistory = async () => {
  const api1 = "https://ipinfo.io/json"
  const api2 = "https://ipwhois.app/json/"  

  try {

   const response1 = await fetch(api1, {
    method: "GET"
   })
   const dataHistory1 = await response1.json()
   
   const response2 = await fetch(api2, {
    method: "GET"
   })
   const dataHistory2 = await response2.json()

    if(dataHistory1 && dataHistory2) {
     ip.innerHTML = dataHistory1.ip
     country.innerHTML = dataHistory2.country
     city.innerHTML = dataHistory1.city
     userAgent.innerHTML = navigator.userAgent
     date.innerHTML = new Date() 
     timeStamp.innerHTML = new Date().getTime()

    } else {
     console.log("error")
    }
  } catch(error) {
   console.error("failed", error)
  }
 }

 document.addEventListener("DOMContentLoaded", myHistory)

</script>