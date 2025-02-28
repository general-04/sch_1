

/*openFormAdmins.forEach((button) => {
    button.addEventListener("click", () => {
        let dataId = button.getAttribute("data-id")
        let userInfo = document.querySelector("#userInfo")
        userInfo.innerHTML = dataId
        popAdmin.style.opacity = "1"
        popAdmin.style.visibility = "visible"
        console.log(true)
       // const runDataUsr = fetch("api/runDataUsr.php")
    })
})

popCancelAdm.addEventListener("click", () => {
 popAdmin.style.opacity = "0"
 popAdmin.style.visibility = "hidden"
})

popAcceptAdm.addEventListener("click", async () => {
 const form = document.querySelector("#formPopAdmin")
 const formChangeAdmin = new FormData(form)

 try {
  const api = "api/backend/formAdmin.php"
  const resFormAdmin = await fetch(api, {
   method: "POST", 
   body: formChangeAdmin
  })
  const dataFormAdmin = await resFormAdmin.json()
  if(dataFormAdmin.status === true) {
   succto(dataFormAdmin.message)
   exUsername.value = dataFormAdmin.updateUser.username
   newUsername.innerHTML = dataFormAdmin.updateUser.username
  } else {
   errto(dataFormAdmin.message)
  }
 } catch(error) {
  console.error("failed", error)
 }
})
*/