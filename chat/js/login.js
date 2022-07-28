errorText = document.getElementById("error_login"),
  continueBtn1 = document.getElementById("btn_login");

form_login.onsubmit = (e) => {
  e.preventDefault();
}


continueBtn1.onclick = () => {
  alert("atach")

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../muebleria/chat/model/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
         // location.href = "usuarios.php";
         //------------------------------------------------------
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  }
  let formData = new FormData(form_login);
  xhr.send(formData);

}