export const WarningMessage = () => {
	Swal.fire({
		title: "มีบางอย่างผิดพลาด",
		html: "<span style='color: #fff;'>กรุณาใส่รหัสนักเรียน ตัวอย่าง: 23456</span>",
		icon: "warning",
		confirmButtonColor: "#cc040e",
		confirmButtonText: "ตกลง"
	});
}
export const ErrorMessage = () => {
	Swal.fire({
		title: "มีบางอย่างผิดพลาด",
		html: "<span style='color: #fff;'>รหัสนักเรียนผิดใส่อีกรอบ ตัวอย่าง: 23456</span>",
		icon: "error",
		confirmButtonText: "ตกลง"
	});
}
export const SuccessMessage = () => {
	Swal.fire({
		title: "สำเร็จ!",
		html: "<span style='color: #fff;'>คุณบันทึกรายชื่อคนมาสายสำเร็จ</span>",
		icon: "success",
		confirmButtonText: "ตกลง"
	});
}
export const ErrorNum = () => {
	Swal.fire({
		title: "เกิดข้อผิดพลาด!",
		html: "<span style='color: #fff;'>กรุณาใส่เฉพาะตัวเลข ตัวอย่าง: 23456</span>",
		icon: "error",
		confirmButtonColor: "#cc040e",
		confirmButtonText: "ตกลง"
	});
}
export const successConfirm = () => {
	Swal.fire({
		title: "ยืนยันที่จะบันทึก?",
		html: "<span style='color: #fff;'>เมื่อบันทึกแล้วไม่สามารถลบได้ ยืนยัน?</span>",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#61bf36",
		cancelButtonColor: "#d33",
		confirmButtonText: "ยืนยัน",
		cancelButtonText: "ยกเลิก"
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: "บันทึกสำเร็จ!",
				html: "<span style='color: #fff;'>คุณบันทึกรายชื่อคนมาสายสำเร็จ</span>",
				icon: "success",
				confirmButtonText: "ตกลง"
			});
		} else if (result.dismiss === Swal.DismissReason.cancel) {
			Swal.fire({
				title: "ยกเลิกบันทึก",
				html: "<span style='color: #fff;'>คุณยกเลิกการบันทึกแล้ว  รอดตัวไป:)</span>",
				icon: "error",
				confirmButtonText: "ตกลง"
			});
		}
	}).catch(error => console.error("Error in successConfirm: ", error));
}
export const showDataTable = (id,uid,name,classd,late,date) => {
 const tAddName = document.createElement("td");
 const tAddClass = document.createElement("td");
 const tAddLate = document.createElement("td");
 const tAddDate = document.createElement("td");

 const tTr = document.createElement("tr");
 tTr.setAttribute("data-id", uid);
 const tBody = document.querySelector("tbody");
 const existing = document.querySelector(`tr[data-id="${uid}"]`);
 if(existing){
  existing.cells[0].innerHTML = name;  
  existing.cells[1].innerHTML = classd; 
  existing.cells[2].innerHTML = late; 
  existing.cells[3].innerHTML = date;  
 } else {

 tAddName.innerHTML = name;
 tTr.appendChild(tAddName);

 tAddClass.innerHTML = classd;
 tTr.appendChild(tAddClass);

 tAddLate.innerHTML = late;
 tTr.appendChild(tAddLate);

 tAddDate.innerHTML = date;
 tTr.appendChild(tAddDate);

 tBody.appendChild(tTr);

 }
}
 