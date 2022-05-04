let nextinput = 1;
let npiso = 1;
let nambiente = 1;
// funcion para agregar mas bloques---------------------------------
function Agregarbloque() {
    nextinput++;


    npiso++;
    nambiente++;
    var content = '<div class="row"><div class="sentra">' +
        '<div class="col-xs-5">' +
        '<input type="text" name="bloque' + nextinput + '" placeholder="bloque" >' +
        '<button type="button">eliminar</button><br>' + '</div>' +
        '<div class="piso"><input type="text" name="piso' + nextinput + npiso + '" placeholder=" piso 1">' +
        '<div id="ambiente' + npiso + '"><hr>' +
        '<input type="text" name="ambiente' + nextinput + npiso + nambiente + '" placeholder=" ambiente ">' + '</div><input onclick="Agregarambiente(' + npiso + ');" type="button" value="+ ambiente" style="background-color: #27AE60; color:white;"   /></div>' + '<div id="pisos' + nextinput + '"></div>' +
        '<input onclick="Agregarpiso(' + nextinput + ');" type="button" value="+ pisos" style="background-color: #27AE60; color:white;" class="btn btn-primary" />' +

        '</div></div>';

    // console.log(npiso);
    //agrega permite ver los campos asignados anteriormente
    $("#sentra").append(content);
    //elimina la fila deseada por el usuario
    //console.log(nextinput);
    $("button").click(function() {
        $(this).closest('div.row').remove();

    });
}
// agregar pisos a la visata del usuario----------------------------


function Agregarpiso(nextinput) {
    npiso++;
    nambiente++;
    var content = '<div class="row"><div class="piso"><div class="col-xs-5"><input type="text" name="piso' + nextinput + npiso + '" placeholder="piso" >' +
        '<button type="button">eliminar</button><hr>' +

        '<div id="ambiente' + npiso + '">' +
        '<input type="text" name="ambiente' + nextinput + npiso + nambiente + '" placeholder="ambiente" >' + '</div>' +
        ' <input onclick="Agregarambiente(' + npiso + ');" type="button" style="background-color: #27AE60; color:white;" value="+ ambiente" class="btn btn-primary" />' +
        '</div></div>';
    // console.log(npiso);
    //agrega permite ver los campos asignados anteriormente
    $("#pisos" + nextinput).append(content);
    //elimina la fila deseada por el usuario
    $("button").click(function() {
        $(this).closest('div.row').remove();
    });
}

function Agregarpiso1(nextinput) {
    npiso++;
    nambiente++;
    var content = '<div class="row"><div class="piso"><div class="col-xs-5"><input type="text" name="piso' + nextinput + npiso + '" placeholder="piso" >' +
        '<button type="button">eliminar</button><hr>' +

        '<div id="ambiente' + npiso + '">' +
        '<input type="text" name="ambiente' + nextinput + npiso + nambiente + '" placeholder="ambiente" >' + '</div>' +
        ' <input onclick="Agregarambiente(' + npiso + ');" type="button" style="background-color: #27AE60; color:white;" value="+ ambiente" class="btn btn-primary" />' +
        '</div></div>';
    // console.log(npiso);
    //agrega permite ver los campos asignados anteriormente
    $("#pisoss" + nextinput).append(content);
    //elimina la fila deseada por el usuario
    $("button").click(function() {
        $(this).closest('div.row').remove();
    });
}

// agregar ambientes al la vista del usuario----------------------------

function Agregarambiente(npiso) {
    nambiente++;

    // console.log(npiso, nextinput);

    var content = '<div class="row"><input type="text" name="ambiente' + nextinput + npiso + nambiente + '" placeholder="ambiente" >' +
        '<button type="button">eliminar</button>' +
        '</div>';


    //agrega permite ver los campos asignados anteriormente
    $("#ambiente" + npiso).append(content);
    //elimina la fila deseada por el usuario
    $("button").click(function() {
        $(this).closest('div.row').remove();
    });

}

function Agregarambiente1(npiso) {
    nambiente++;

    // console.log(npiso, nextinput);

    var content = '<div class="row"><input type="text" name="ambiente' + nextinput + npiso + nambiente + '" placeholder="ambiente" >' +
        '<button type="button">eliminar</button>' +
        '</div>';


    //agrega permite ver los campos asignados anteriormente
    $("#ambientes" + npiso).append(content);
    //elimina la fila deseada por el usuario
    $("button").click(function() {
        $(this).closest('div.row').remove();
    });

}
let nambiente3 = 0;

function Agregarambiente3() {
    nambiente3++;

    // console.log(npiso, nextinput);

    var content = '<div class="row"><input type="text" name="ambiente" placeholder="ambiente" >' +
        '<button type="button">eliminar</button>' +
        '</div>';


    //agrega permite ver los campos asignados anteriormente
    $("#ambientefin").append(content);
    //elimina la fila deseada por el usuario
    $("button").click(function() {
        $(this).closest('div.row').remove();
    });

}