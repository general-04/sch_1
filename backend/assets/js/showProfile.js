const pfile = document.querySelector("#profile")
const user = document.querySelector("#username")

user.addEventListener("input", async () => {
 try{
   const apipfile = `api/backend/findProfile.php?pname=${user.value}`
   const reqpfile = await fetch(apipfile, {
  method: "GET"
 })
   const datapfile = await reqpfile.json()
    if(datapfile.status === true){
     pfile.setAttribute("src", datapfile.profile)
    } else {
     pfile.setAttribute("src", "assets/img/dogp.png")
    }
 } catch(error) {
  console.log("failed: ", error)
 }
})
 