const newAcc = document.querySelector("#newAc")
const popAc = document.querySelector("#popAccess") 
const popCancel2 = document.querySelector("#close-2")
const popAccept2 = document.querySelector("#accept-2")

let exAccess = document.querySelector("#access")
let newAccess = document.querySelector("#newAccess")

newAcc.addEventListener("click", () => {
 popAc.style.opacity = "1"
 popAc.style.visibility = "visible"
})

popCancel2.addEventListener("click", () => {
 popAc.style.opacity = "0"
 popAc.style.visibility = "hidden"
})

popAccept2.addEventListener("click", async () => {
 const popFormAccess = document.querySelector("#formPopAccess")
 const formChangeAc = new FormData(popFormAccess)
 console.log(Object.fromEntries(formChangeAc))
 try { 
  const api = "api/backend/newAccess.php"
  const resAc = await fetch(api, {
   method: "POST",
   body: formChangeAc
  })
  const dataChangeAccess = await resAc.json()
  if(dataChangeAccess.status === true) {
   console.log(dataChangeAccess)
   succto(dataChangeAccess.message)
   exAccess.value = dataChangeAccess.updateUser.access
   newAccess.innerHTML = `${dataChangeAccess.updateUser.access} นาที` 
  } else {
   console.log(dataChangeAccess)
   errto(dataChangeAccess.message)
  }
 } catch(error) {
  console.log("failed", error)
 }
})