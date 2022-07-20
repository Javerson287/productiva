//para poder desmarcar el boton de los días 
var noera;
function uncheckRadio(rbutton, a) {
        
        if (rbutton.checked == true && noera == true) {
                rbutton.checked = false;
                cambio2(a);
               
        } else {cambio(a);} 
        noera = rbutton.checked; meses();
}


if ( $('#l').val()==1) { $("#lunes").click();cambio("lunes");}
if ( $('#mar').val()==1) {$("#martes").click();cambio("martes");}
if ( $('#mir').val()==1) {$("#mir").click();cambio("mir");}
if ( $('#ju').val()==1) {$("#j").click();cambio("j");}
if ( $('#vi').val()==1) {$("#v").click();cambio("v");}
if ( $('#sa').val()==1) {$("#s").click();cambio("s");}
if ( $('#do').val()==1) {$("#d").click();cambio("d");}






function cambio(a) {
        var Myelement = document.getElementById(a);
        Myelement.value = "1";
}
function cambio2(a) {
        var Myelement = document.getElementById(a);
        Myelement.value = "2";
}

function meses() {
       
        $.ajax({
                type: "GET",
                url: "../controladores/fechas.php",
                data: "fecha_i=" + $('#fecha_i').val() +
                        "& fecha_f=" + $('#fecha_f').val() +
                        "& h_i=" + $('#h_i').val() +
                        "& h_f=" + $('#h_f').val() +
                        "& l=" + $('#lunes').val() +
                        "& mar=" + $('#martes').val() +
                        "& mir=" + $('#mir').val() +
                        "& j=" + $('#j').val() +
                        "& v=" + $('#v').val() +
                        "& s=" + $('#s').val() +
                        "& d=" + $('#d').val() +
                        "& prestamo=" + $('#prestamo').val(),
                success: function (r) {
                        $('#meses').html(r);
                }
        });
}

//funcion para poder ver la cantidad de horas establecidas (horas calculadas)

function visible_mes(rbutton) {
        var mes_hora = document.getElementById('mes_hora');
        if (rbutton.checked == true && noera == true) {
                rbutton.checked = false;
                mes_hora.classList.remove('active');
        } else {
                mes_hora.classList.add('active');
        }
        noera = rbutton.checked;

}


//funcion para colocar un minimo de una fecha a la fecha final que se va poner esto es para evitar problemas
function pasar() {
        var value = $("#fecha_i").val();
        $("#fecha_f").attr("min", value);
}


function meses2(f_i, f_f, h_i, h_f, l, mar, mir, j, v, s, d,div) {
        //intento con un una funcion trayendo los datos des la hora en que se trae de la base de datos

        console.log($('#fecha_i').val()+"hola");
        $.ajax({
                type: "GET",
                url: "../controladores/fechas.php",
                data: "fecha_i=" + f_i +
                        "& fecha_f=" + f_f +
                        "& h_i=" + h_i +
                        "& h_f=" + h_f +
                        "& l=" + l +
                        "& mar=" + mar +
                        "& mir=" + mir +
                        "& j=" + j +
                        "& v=" + v +
                        "& s=" + s +
                        "& d=" + d,
                success: function (r) {
                        $('.'+div).html(r);
                }
        });
        
}
