var noera;
function uncheckRadio(rbutton) {
    console.log("entra al paginador");
    if (rbutton.checked == true && noera == true) {
        rbutton.checked = false;
    }
    noera = rbutton.checked;
}

Paginador = function (divPaginador, tabla, tamPagina) {
    this.miDiv = divPaginador; //un DIV donde irán controles de paginación
    this.tabla = tabla;           //la tabla a paginar
    this.tamPagina = tamPagina; //el tamaño de la página (filas por página)
    this.pagActual = 1;         //asumiendo que se parte en página 1
    this.paginas = Math.floor((this.tabla.rows.length - 1) / this.tamPagina); //¿?

    this.SetPagina = function (num) {
       
        if (num < 0 || num > this.paginas)
            return;

        this.pagActual = num;
        var min = 1 + (this.pagActual - 1) * this.tamPagina;
        var max = min + this.tamPagina - 1;

        var co = 0;
        for (var i = 1; i < this.tabla.rows.length; i++) {


            if (i < min || i > max) {


                this.tabla.rows[i].style.display = 'none';
            } else {

                this.tabla.rows[i].style.display = '';
            }
            co++;
        }
//imprime el numero de la pagina actual
        this.miDiv.firstChild.rows[0].cells[1].innerHTML = this.pagActual;
        this.miDiv.firstChild.rows[0].cells[2].innerHTML = this.paginas;
    }

    this.Mostrar = function () {
        //Crear la tabla
        var tblPaginador = document.createElement('table');

        //Agregar una fila a la tabla
        var fil = tblPaginador.insertRow(tblPaginador.rows.length);

        //Ahora, agregar las celdas que serán los controles
        var ant = fil.insertCell(fil.cells.length);
        ant.innerHTML = 'Anterior';
        ant.className = 'pag_btn'; //con eso le asigno un estilo
        var self = this;
        ant.onclick = function () {
            if (self.pagActual == 1)
                return;
            self.SetPagina(self.pagActual - 1);
        }

        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';
        var num = fil.insertCell(fil.cells.length);
        num.innerHTML = ''; //en rigor, aún no se el número de la página
        num.className = 'pag_num';

        var sig = fil.insertCell(fil.cells.length);
        sig.innerHTML = 'Siguiente';
        sig.className = 'pag_btn';

        sig.onclick = function () {
            if (self.pagActual == self.paginas)
                return;
            self.SetPagina(self.pagActual + 1);
        }

        //Como ya tengo mi tabla, puedo agregarla al DIV de los controles
        //this.miDiv.appendChild(tblPaginador); con esta linea de codigo se duplica el salto de pagina cadad ves que se realiza una busqueda

        $('#paginador').html(tblPaginador);

        //¿y esto por qué?
        if (this.tabla.rows.length - 1 > this.paginas * this.tamPagina) {
            this.paginas = this.paginas + 1;//cantidad de paginas disponibles
           
        }
     

        this.SetPagina(this.pagActual);
    }
}
if ($('#n_pagi').val()=="hc"){
    var p = new Paginador(
        document.getElementById('paginador'),
        document.getElementById('tblDatos'),
        //numero de las filas que se mostraran en pantalla
        16
    );    
}
if ($('#n_pagi').val()=="h") {
    var p = new Paginador(
        document.getElementById('paginador'),
        document.getElementById('tblDatos'),
        //numero de las filas que se mostraran en pantalla
        9
    );  
}
if ($('#n_pagi').val()=="ins" ) {
    var p = new Paginador(
        document.getElementById('paginador'),
        document.getElementById('tbinstructor'),
        //numero de las filas que se mostraran en pantalla
        7
    );  
}
if ($('#n_pagi').val()=="programas") {
    var p = new Paginador(
        document.getElementById('paginador'),
        document.getElementById('progra'),
        //numero de las filas que se mostraran en pantalla
        7
    );  
}
p.Mostrar();

