
document.addEventListener('DOMContentLoaded', function () {
    var contador = 0;
    btn_mss.addEventListener("click", () => {

        if (contador === 0) {
            wrapper.classList.remove('none');
            wrapper2.classList.remove('none');
           // wrapper3.classList.add('none');
            contador++;
        } else {
            wrapper.classList.add('none');
            wrapper2.classList.add('none');
           // wrapper3.classList.remove('none');

            contador = 0;
        }
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