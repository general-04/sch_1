const newUsernm = document.querySelector("#newNm")
const pop = document.querySelector("#popName") 
const popCancel1 = document.querySelector("#close-1")
const popAccept = document.querySelector("#accept-1")

const checkSee = document.querySelector("#coverSee")
const see = document.querySelector("#see")
const noSee = document.querySelector("#noSee")
const pwd = document.querySelector(`[name="confirm_password"]`)

let exUsername = document.querySelector("#username")
let newUsername = document.querySelector("#newUsername")

checkSee.addEventListener("click", () => {
 if(pwd.type === "password") {
  pwd.type = "text"
  see.style.display = "none"
  noSee.style.display = "block"
  console.log("pwd")
 } else {
  pwd.type = "password"
  see.style.display = "block"
  noSee.style.display = "none"
  console.log("not found pwd")
 }
})

newUsernm.addEventListener("click", () => {
 pop.style.opacity = "1"
 pop.style.visibility = "visible"
})

popCancel1.addEventListener("click", () => {
 pop.style.opacity = "0"
 pop.style.visibility = "hidden"
})

popAccept.addEventListener("click", async () => {
 const form = document.querySelector("#formPopName")
 const formChange = new FormData(form)

 try {
  const api = "api/backend/newName.php"
  const res = await fetch(api, {
   method: "POST", 
   body: formChange
  })
  const dataChangeName = await res.json()
  if(dataChangeName.status === true) {
   succto(dataChangeName.message)
   exUsername.value = dataChangeName.updateUser.username
   newUsername.innerHTML = dataChangeName.updateUser.username
  } else {
   errto(dataChangeName.message)
  }
 } catch(error) {
  console.error("failed", error)
 }
})