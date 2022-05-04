function imprimir(h) {
    varoverlay2 = document.getElementById('overlay2'),
        popup2 = document.getElementById('popup2'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup2');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("cambio1").value = h;

    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });
    console.log(h);
}

function imprimir2(p) {

    console.log(p);
    var overlay2 = document.getElementById('overlay3'),
        popup2 = document.getElementById('popup3'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup3');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("cambio2").value = p;

    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}

function imprimir3(i, n) {
    var overlay2 = document.getElementById('overlay4'),
        popup2 = document.getElementById('popup4'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup4');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("cambio3").value = i;
    document.getElementById("cambio4").value = 'ambiente';
    document.getElementById("cambio5").value = n;
    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}

// funcion para la actualizacion del nombre de la sede
function imprimir4(n) {
    var overlay2 = document.getElementById('overlay5'),
        popup2 = document.getElementById('popup5'),
        btnCerrarPopup2 = document.getElementById('btn-cerrar-popup5');

    overlay2.classList.add('active');
    popup2.classList.add('active');
    document.getElementById("cambio6").value = n;
    btnCerrarPopup2.addEventListener('click', function(e) {
        e.preventDefault();
        overlay2.classList.remove('active');
        popup2.classList.remove('active');
    });

}

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