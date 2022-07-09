
document.addEventListener('DOMContentLoaded', function () {
    var contador = 0;
    btn_mss.addEventListener("click", () => {
        if (contador === 0) {
            wrapper.classList.add('none');
            console.log(wrapper.classList);
            contador++;
        } else {
            wrapper.classList.remove('none');
            contador = 0;
            console.log(wrapper.classList);
        }
    });




});