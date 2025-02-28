//GET fn href ไปหน้านั้นๆ
 const setAtPage = async () => {
 const formValue = NumInp.value.trim()
  window.location.href = `?page=admin&subpage=studentsDataLate&setAtLate=${formValue}`
}

//GET fn หาชื่อ
 const searchName = async () => {
 const namePure = document.querySelector("#name")
 const name = namePure.value.trim()
 try{
  const respName = await fetch(`api/stdLate/searchName.php?name=${name}`, {
  method: "GET"
})
  const dataName = await respName.json()
   if(dataName.status === true) {
    updateTable(dataName.dataStd)
   } else {
    console.log("failed: ", dataName.message)
    tableNotFound()
    i2.classList.add("text-danger")
   }
 } catch(error) {
  console.log("failed: ", error)
 }
}

//POST fn หาชั้น
 const changClass = async (e) => {
 try {
    const resp = await fetch("api/stdLate/searchClass.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        payloadClass: e.target.value,
      })
    })
    const dataClass = await resp.json()

    if (dataClass.status === true) {
       updateTable(dataClass.students)
       console.table(dataClass.message)
    } else {
      console.error("ไม่พบข้อมูลชั้นเรียน")
      tableNotFound()
      i1.classList.add("text-danger")
    }
  } catch (error) {
    console.error("failed:", error)
  }
}