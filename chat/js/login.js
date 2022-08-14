errorText = document.getElementById("error_login"),
  continueBtn1 = document.getElementById("btn_login");

form_login.onsubmit = (e) => {
  e.preventDefault();
}

continueBtn1.onclick = () => {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../muebleria/chat/model/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        data = data.split(" ").join("");
        var letter = "success";
        console.log(data);

        console.log(letter.length);
        if (data === "success") {
          wrapper.classList.add('none');
          wrapper2.classList.add('none');
          wrapper3.classList.remove('none');
          init();
        } else {
          errorText.style.display = "block";
          errorText.textContent = data;
          console.log(data);
        }
      }
    }
  }
  let formData = new FormData(form_login);
  xhr.send(formData);

}