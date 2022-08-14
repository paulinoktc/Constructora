
document.addEventListener('DOMContentLoaded', function () {
    var activo = false;
    var contador = 0;
    btn_mss.addEventListener("click", () => {
        fetch("../muebleria/chat/js/chekSession.php", {
            method: "GET"
        })
            .then(response => response.text()
                .then(response => {
                    if (activo) {
                        if (response === "true") {
                            wrapper3.classList.add('none');
                        } else {
                            wrapper.classList.add('none');
                            wrapper2.classList.add('none');
                        }
                        activo = false;
                    } else {
                        if (response === "true") {
                            wrapper3.classList.remove('none');
                        } else {
                            wrapper2.classList.remove('none');
                        }
                        activo = true;
                    }

                }));
        console.log(activo);

    });


    register.addEventListener("click", () => {
        wrapper2.classList.add('none');

        if (wrapper.classList.contains("none")) {
            wrapper.classList.remove('none');
        }
    });

    btn_init.addEventListener("click", () => {
        wrapper.classList.add('none');
        wrapper2.classList.remove('none');

    });

    form_register.onsubmit = (e) => {
        e.preventDefault();
    }


});