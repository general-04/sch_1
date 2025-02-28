//passwd old
const checkOld = document.querySelector("#typeCheckOld");
const pwdOld = document.querySelector("#oldpassshow");
const noOld = document.querySelector("#oldpassno");
const oldPwd = document.querySelector("#Oldpassword");
checkOld.addEventListener("click", () => {
    if (oldPwd.type === "password") {
        oldPwd.type = "text";
        pwdOld.style.display = "none";
        noOld.style.display = "block";
        console.log("pwd");
    } else {
        oldPwd.type = "password";
        noOld.style.display = "none";
        pwdOld.style.display = "block";
        console.log("nopwd");
    }
});

//passwd new
const checkNew = document.querySelector("#btnCheckNew");
const newOk = document.querySelector("#new");
const newNo = document.querySelector("#noNew");
const inpNew = document.querySelector("#inpNew");
checkNew.addEventListener("click", () => {
    if (inpNew.type === "password") {
        inpNew.type = "text";
        newOk.style.display = "none";
        newNo.style.display = "block";
    } else {
        inpNew.type = "password";
        newOk.style.display = "block";
        newNo.style.display = "none";
    }
});

//passwd con
const checkCon = document.querySelector("#btnCheckCon");
const conOk = document.querySelector("#con");
const conNo = document.querySelector("#noCon");
const inpCon = document.querySelector("#inpCon");
checkCon.addEventListener("click", () => {
    if (inpCon.type === "password") {
        inpCon.type = "text";
        conOk.style.display = "none";
        conNo.style.display = "block";
    } else {
        inpCon.type = "password";
        conOk.style.display = "block";
        conNo.style.display = "none";
    }
});