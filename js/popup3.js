function imprimir5() {
    var overlay2 = document.getElementById('overlay5'),
        popup2 = document.getElementById('popup5'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup5');

    overlay2.classList.add('active');
    popup2.classList.add('active');

    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}

function imprimir6(n, p, i) {
    var overlay2 = document.getElementById('overlay5'),
        popup2 = document.getElementById('popup5'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup5');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("cambio6").value = n;
    document.getElementById("cambio7").value = p;
    document.getElementById("cambio8").value = p;
    $(document).ready(function() {
        $('[id="inputState selectLang"]').val(i);
    });



    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}