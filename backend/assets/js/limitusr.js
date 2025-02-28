const btnLimit = document.querySelector("#btnLimit")
const popLimit = document.querySelector("#popLimit") 
const popCancel3 = document.querySelector("#close-3")
const popAccept3 = document.querySelector("#accept-3")

let newLimit = document.querySelector("#newLimitShow")

btnLimit.addEventListener("click", () => {
 popLimit.style.opacity = "1"
 popLimit.style.visibility = "visible"
})

popCancel3.addEventListener("click", () => {
 popLimit.style.opacity = "0"
 popLimit.style.visibility = "hidden"
})

popAccept3.addEventListener("click", async () => {
 const popFormLimit = document.querySelector("#formPopLimit")
 const formChangeLimit = new FormData(popFormLimit)
 console.log(Object.fromEntries(formChangeLimit))
 try { 
  const api = "api/backend/newLimitUsr.php"
  const resLimit = await fetch(api, {
   method: "POST",
   body: formChangeLimit
  })
  const dataChangeLimit = await resLimit.json()
  if(dataChangeLimit.status === true) {
   console.log(dataChangeLimit)
   succto(dataChangeLimit.message)
   newLimit.innerHTML = `${dataChangeLimit.updateUser.limitusr} คน `
  } else {
   console.log(dataChangeLimit)
   errto(dataChangeLimit.message)
  }
 } catch(error) {
  console.log("failed", error)
 }
})