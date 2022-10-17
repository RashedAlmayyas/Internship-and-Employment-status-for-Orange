document.getElementById("button1").onclick = function () {
  Validation();
};

function Validation() {
  //************* for Email Validation *****************************
  let inputMail = email.value;
  let validMail =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (inputMail.match(validMail)) {
    document.getElementById("email").style.borderColor = "black";
  } else {
    document.getElementById("em_check").style.display = "block";
    document.getElementById("email").style.borderColor = "red";
  }

  //************* for tel Validation *****************************

  let inputTel = mobile.value;
  // let validTel = /[0-9]*$/;
  if (inputTel.length == 10) {
    document.getElementById("mobile").style.borderColor = "black";
  } else {
    document.getElementById("tel_check").style.display = "block";
    document.getElementById("mobile").style.borderColor = "red";
  }
  //************* for Pass Validation *****************************
  let inputPass = passwords.value;

  if (inputPass.length < 6) {
    document.getElementById("passwords").style.borderColor = "black";
  } else {
    document.getElementById("pCheck_18").style.display = "block";
    document.getElementById("passwords").style.borderColor = "red";
  }

  if (inputPass.length <= 18 && inputPass.length >= 6) {
    document.getElementById("passwords").style.borderColor = "black";
  } else if (inputPass.length > 18) {
    document.getElementById("passwords").style.borderColor = "red";
  } else {
    document.getElementById("pCheck_6").style.display = "block";
    document.getElementById("passwords").style.borderColor = "red";
  }
  if (
    inputPass.length <= 18 &&
    inputPass.length >= 6 &&
    inputTel.length == 10 &&
    inputMail.match(validMail)
  ) {
    //  <<<<<<<<<<<<<<<<<<<<<<<<<<<  stores items in the localStorage   >>>>>>>>>>>>>>>>>>>>>>>>>>>

    let local_Form = JSON.parse(localStorage.getItem("local_Form")) || []; //convert the object to "string"
    local_Form.push({ Mail: inputMail, Pass: inputPass, Tell: inputTel });
    localStorage.setItem("local_Form", JSON.stringify(local_Form)); // convert the "string" to object
    window.open("./index_log in.html");
  }
}

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#passwords");

togglePassword.addEventListener("click", function (sighIn) {
  // toggle the type attribute
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  // toggle the eye slash icon
  this.classList.toggle("fa-eye-slash");
});
