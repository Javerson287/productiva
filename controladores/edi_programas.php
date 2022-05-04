    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <div class="popup_pro" id="popup_pro">
        <a href="#" id="btn-cerrar-popup_pro" class="btn-cerrar-popup_pro"><i class="fas fa-times"></i></a>
        <h3>Editar ñ Programas</h3>
        <?php


        ?>


        <form action="../controladores/editar2.php" method="GET" id="form">
            <!-- e almasena informacion del programa temporalmente que se ira a actualizar o modificar -->
            <input type="hidden" name="ficha_i" id="fichai" value="fichai">
            <input type="hidden" name="campo_tabla" value="ficha">
            <input type="hidden" name="tabla" value="programas">
            <div class="am">
                <!-- este es el formulario que le muestra al uuario para poder modificar los campos -->
                <!-- id programa -->
                <input type="text" id="ficha" value="" name="edi" placeholder="id programa ">
                <!-- nombre del programa -->
                <input type="text" id="c" value="" name="edi" placeholder=" programa">
                <!-- ct aprendizes -->
                <input type="text" id="ct_aprendiz" value="" name="ct_aprendiz" placeholder="ct_aprendiz" />

                <!-- lista de los nivele que hay registrados -->
                <select name='nivel' id="nv" class="form-control" required>
                    <?php
                    //Vincular con la tabla tipo_formacion y extraer datos
                    $query = $mysqli->query("SELECT * FROM nivel");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option  value="' . $valores['id_nivel'] . '">' . $valores['n_nivel'] . '</option>';
                    }
                    ?>
                    <!--fin select-->
                </select>

                <!-- lista de tipos de formacion que hay registrados -->
                <select name='profecion' id="f" class="form-control" required>
                    <?php
                    //Vincular con la tabla tipo_formacion y extraer datos
                    $query = $mysqli->query("SELECT * FROM tipo_formacion");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option  value="' . $valores['t_formacion'] . '">' . $valores['t_formacion'] . '</option>';
                    }
                    ?>
                    <!--fin select-->
                </select><br><br>
                <button type="submit" value="enviar">enviar</button>
            </div>

        </form>


    </div>