const studentID = document.querySelector("#stId");
const stdName = document.querySelector("#studentName");
const stdClass = document.querySelector("#studentClass");
    

studentID.addEventListener("input", async () => {
 const searchData = studentID.value.trim();

 if(!searchData.length){
   stdName.value = `Undefined`;
   stdClass.value = `Undefined`;
   return;
 }
 try{
  const res = await fetch(`api/stdSearch.php?searchData=${searchData}`, {
   method: "GET"
  })
   if(!res.ok) {
    throw new Error("failed ...");
   }
  const data = await res.json();
    stdName.value = `${data.name}`;
    stdClass.value = `${data.year}/${data.class}`;
    console.log(data)

} catch(error) {
    console.log(error)
   stdName.value = `Undefined`;
   stdClass.value = `Undefined`;
}
})

 