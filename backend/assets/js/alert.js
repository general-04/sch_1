export const WarningMessage = () => {
	Swal.fire({
		title: "มีบางอย่างผิดพลาด",
		html: "<span style='color: #fff;'>กรุณาใส่ ชื่อผู้ใช้ หรือ รหัสผ่านให้ครบ</span>",
		icon: "warning",
		confirmButtonColor: "#cc040e",
		confirmButtonText: "ตกลง"
	});
}

export const ErrorLimit = (limit) => {
	Swal.fire({
		title: "มีบางอย่างผิดพลาด",
		html: `<span style='color: #fff;'>ขณะนี้มีผู้ใช้งานครบ ${limit} จำนวนแล้วรออีกในภายหลัง</span>`,
		icon: "warning",
		confirmButtonColor: "#fb923c",
		confirmButtonText: "ตกลง"
	});
}

export const ErrorMessage = () => {
	Swal.fire({
		title: "มีบางอย่างผิดพลาด",
		html: "<span style='color: #fff;'>ชื่อผู้ใช้ หรือ รหัสผ่านผิด ลองเลือกลืมรหัสผ่าน?</span>",
		icon: "error",
		confirmButtonText: "ตกลง"
	});
}
export const SuccessMessage = (name) => {
	Swal.fire({
		title: "เข้าสู่ระบบสำเร็จ!",
		html: `<span style='color: #fff;'>เข้าสู่ระบบ หลังบ้านแล้ว คุณ ${name}!</span>`,
		icon: "success", 
  confirmButtonColor: "#61bf36",
		confirmButtonText: "ตกลง"
	}).then(() => {
	 window.location.href = "?page=admin&subpage=showData"; 
	});
}
export const ErrorMs = () => {
	Swal.fire({
		title: "เกิดข้อผิดพลาด!",
		html: "<span style='color: #fff;'>กรุณากรอกให้ถูกต้อง</span>",
		icon: "error",
		confirmButtonColor: "#cc040e",
		confirmButtonText: "ตกลง"
	});
}
export const ErrorMth = () => {
	Swal.fire({
		title: "เกิดข้อผิดพลาด!",
		html: "<span style='color: #fff;'>เฉพาะ Method POST</span>",
		icon: "error",
		confirmButtonColor: "#cc040e",
		confirmButtonText: "ตกลง"
	});
}
export const ConfirmMessage = () => {
  return Swal.fire({
    title: 'ยืนยันการ Logout!',
    html: "<span style='color: #fff;'>คุณแน่ใจที่จะออกจากระบบใช่ไหมหากแน่ใจกดดำเนินการ</span>",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'ดำเนินการต่อ',
    confirmButtonColor: "#61bf36",
    cancelButtonText: 'ยกเลิกทันที',
    cancelButtonColor: "#3085d6",
    reverseButtons: true 
  }).then((result) => {
    if (result.isConfirmed) {
      document.querySelector("#logoutForm").submit()
      return 'confirmed';
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      return 'cancelled';
    }
  });
};

