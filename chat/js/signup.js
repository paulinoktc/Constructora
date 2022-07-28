//const form = document.querySelector(".signup form"),
continueBtn = document.getElementById("btn_register"),
  errorText = document.getElementById("error_register");

form_register.onsubmit = (e) => {
  e.preventDefault();
}

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../muebleria/chat/model/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          // location.href = "usuarios.php";
          alert("REGISTER CORRECY")
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  }
  let formData = new FormData(form_register);
  xhr.send(formData);
}