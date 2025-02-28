const btnEmail = document.querySelector("#btnEmail")
const popEmail = document.querySelector("#popEmail") 
const popCancel4 = document.querySelector("#close-4")
const popAccept4 = document.querySelector("#accept-4")

const checkSee2 = document.querySelector("#coverSee2")
const see2 = document.querySelector("#see2")
const noSee2 = document.querySelector("#noSee2")
const pwd2 = document.querySelector(`[name="confirm_password2"]`)

let exEmail = document.querySelector("#email")
let newEmail = document.querySelector("#newEmail")

checkSee2.addEventListener("click", () => {
 if(pwd2.type === "password") {
  pwd2.type = "text"
  see2.style.display = "none"
  noSee2.style.display = "block"
 } else {
  pwd2.type = "password"
  see2.style.display = "block"
  noSee2.style.display = "none"
 }
})

btnEmail.addEventListener("click", () => {
 popEmail.style.opacity = "1"
 popEmail.style.visibility = "visible"
})

popCancel4.addEventListener("click", () => {
 popEmail.style.opacity = "0"
 popEmail.style.visibility = "hidden"
})

popAccept4.addEventListener("click", async () => {
 const form = document.querySelector("#formPopEmail")
 const formChangeEmail = new FormData(form)

 try {
  const api = "api/backend/newEmail.php"
  const resEmail = await fetch(api, {
   method: "POST", 
   body: formChangeEmail
  })
  const dataChangeEmail = await resEmail.json()
  console.log(dataChangeEmail)
  if(dataChangeEmail.status === true) {
   succto(dataChangeEmail.message)
   exEmail.value = dataChangeEmail.updateUser.email
   newEmail.innerHTML = dataChangeEmail.updateUser.email
  } else {
   errto(dataChangeEmail.message)
  }
 } catch(error) {
  console.error("failed", error)
 }
})
