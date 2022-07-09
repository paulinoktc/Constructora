const form = document.querySelector(".login form"),
  //continueBtn = form.querySelector(".button input"),
  errorText = form.querySelector(".error-text"),
  continueBtn1 = document.getElementById("btn_login");
form.onsubmit = (e) => {
  e.preventDefault();
}

continueBtn1.onclick = () => {
  alert("atach")

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../modelo/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data === "success") {
          location.href = "usuarios.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
        }
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);

}