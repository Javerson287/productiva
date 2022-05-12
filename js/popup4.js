//estas funciones sirven para los popus de programas

function imprimir5() {
    var overlay2 = document.getElementById('overlay_pro'),
        popup2 = document.getElementById('popup_pro'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup_pro');

    overlay2.classList.add('active');
    popup2.classList.add('active');

    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}

function imprimir6(f, nn, tf, ct, nv) {
    var overlay2 = document.getElementById('overlay_pro'),
        popup2 = document.getElementById('popup_pro'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup_pro');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("ficha").value = f;
    document.getElementById("c").value = nn;
    document.getElementById("fichai").value = f;
    document.getElementById("nv").value = nv;
    document.getElementById("f").value = tf;

    document.getElementById("ct_aprendiz").value = ct;


    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}