const form = document.querySelector("#formData")
const pwdNew = document.querySelector("#inpNew")
const pwdCon = document.querySelector("#inpCon")
const strg = document.querySelector("#strg")
const textPercent = document.querySelector("#percent")

const textTap = document.querySelector("#text-tap")
const strgRed = document.querySelector("#strg-red")
const strgOrange = document.querySelector("#strg-orange")
const strgYellow = document.querySelector("#strg-yellow")
const strgGreen = document.querySelector("#strg-green")
const strgBlue = document.querySelector("#strg-blue")
const strgDanger = document.querySelector("#strg-danger")
const strgGray = document.querySelector("#strg-gray")
const strgHarfOrange = document.querySelector("#strg-harf-orange")
const strgHarfGreen = document.querySelector("#strg-harf-green")

const messg = {
 red: "สั้นเกินไปมาก!",
 orange: "ความปลอดภัยต่ำ",
 yellow: "ความปลอดภัยค่อนข้างดี",
 green: "ความปลอดภัยสูง",
 blue: "ความปลอดภัยสูงมาก",
 incorrect: "รหัสไม่ตรงกัน",
 gray: "รหัสผ่านว่างเปล่า",
 almost: "เฝ้าระวังไม่แน่นอน",

 text: {
  dang: "#e11d48",
  red: "#f43f5e",
  orange: "#f97316",
  yellow: "#fcd34d",
  green: "#4ade80",
  blue: "#38bdf8",
  gray: "gray"
 }
}

const strgShow = (messg, tap, text) => {
 const strgall = [strgRed, strgOrange, strgYellow, strgGreen, strgBlue, strgDanger, strgGray, strgHarfGreen, strgHarfOrange]
 strgall.forEach((strg) => {
  strg.style.display = "none"
 })
 tap.style.display = "block"
 textTap.innerHTML = messg
 textTap.style.color = text
}

form.addEventListener("input", () => {
 const valNew = pwdNew.value
 const valCon = pwdCon.value
 let percentTap = 0  

 if(valNew === valCon) {
  const valCha = valNew && valCon
  const valLen = valNew.length
  const cha = /[a-z]/
  const CHA = /[A-Z]/
  const numeric = /[0-9]/
  const spec = /[+\-*#@()?!.:"'$฿&_,<>{}\\=\$%]/
  const letters = /^[A-Za-z]+$/ 
  const tenNum = /^\d{10,}$/

//set
  if (valLen == 0) percentTap += 0
  if (valLen >= 2) percentTap += 5
  if (valLen >= 3) percentTap += 5
  if (valLen >= 4) percentTap += 10
  if (valLen >= 6) percentTap += 10
  if (valLen >= 8) percentTap += 10
  if (valLen >= 10) percentTap += 10

//rule 
  if (tenNum.test(valCha)) {
   percentTap = 50
  } else if (letters.test(valCha) && valLen >= 10) {
   percentTap = 50
  } else if (valLen >= 4 && valLen < 5 && percentTap > 10) {
   percentTap = 40
  } else {
   if (cha.test(valCha)) percentTap += 10 
   if (CHA.test(valCha)) percentTap += 10 
   if (numeric.test(valCha)) percentTap += 15 
   if (spec.test(valCha)) percentTap += 15 
  }

  textPercent.innerHTML = `${percentTap}`

  if (percentTap === 0) {
   strgShow(messg.gray, strgGray, messg.text.gray)
  } else if (percentTap === 5) {
   strgShow(messg.red, strgRed, messg.text.red)
  } else if (percentTap === 10) {
   strgShow(messg.red, strgRed, messg.text.red)
  } else if (percentTap === 15) {
   strgShow(messg.red, strgRed, messg.text.red)
  } else if (percentTap === 20) {
   strgShow(messg.red, strgRed, messg.text.red)
  } else if (percentTap === 25) {
   strgShow(messg.orange, strgOrange, messg.text.orange)
  } else if (percentTap === 30) {
   strgShow(messg.orange, strgOrange, messg.text.orange)
  } else if (percentTap === 35) {
   strgShow(messg.orange, strgOrange, messg.text.orange)
  } else if (percentTap === 40) {
   strgShow(messg.orange, strgOrange, messg.text.orange)
  } else if (percentTap === 45) {
   strgShow(messg.orange, strgOrange, messg.text.orange)
  } else if (percentTap === 50) {
   strgShow(messg.almost, strgHarfOrange, messg.text.orange)
  } else if (percentTap === 55) {
   strgShow(messg.almost, strgHarfOrange, messg.text.yellow)
  } else if (percentTap === 60) {
   strgShow(messg.yellow, strgYellow, messg.text.yellow)
  } else if (percentTap === 65) {
   strgShow(messg.yellow, strgYellow, messg.text.yellow)
  } else if (percentTap === 70) {
   strgShow(messg.yellow, strgHarfGreen, messg.text.yellow)
  } else if (percentTap === 75) {
   strgShow(messg.yellow, strgHarfGreen, messg.text.yellow)
  } else if (percentTap === 80) {
   strgShow(messg.green, strgGreen, messg.text.green)
  } else if (percentTap === 85) {
   strgShow(messg.green, strgGreen, messg.text.green)
  } else if (percentTap === 90) {
   strgShow(messg.green, strgGreen, messg.text.green)
  } else if (percentTap === 95) {
   strgShow(messg.blue, strgBlue, messg.text.blue)
   strgBlue.style.boxShadow = "none"
  } else if (percentTap === 100) {
   strgShow(messg.blue, strgBlue, messg.text.blue)
   strgBlue.style.boxShadow = "0 0 6px 2px #38bdf8"
   strgBlue.style.transition = "box-shadow 5s ease"
   strgBlue.style.animation = "color-wip 5s infinite"

   strgBlue.addEventListener('animationiteration', () => {
    strgBlue.style.animation = "fadeIn 5s infinite"
   })
  }
 } else {
  strgShow(messg.incorrect, strgDanger, messg.text.dang)
  textPercent.innerHTML = "?"
 }
})
              /*           Made by me            */