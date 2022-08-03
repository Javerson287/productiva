    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <div class="popup_pro" id="popup_pro">
        <a href="#" id="btn-cerrar-popup_pro" class="btn-cerrar-popup_pro"><i class="fas fa-times"></i></a>
        <h3>Editar  Programas</h3>
        <form action="../controladores/editar3.php" method="POST" id="form">

        <table class="table" >
            <thead>
                <th>ficha</th>
                <th>nombre del programa</th>
                <th>ct_aprendices</th>
                <th>nivel</th>
                <th>tipo de formacion</th>
            </thead>
            <tbody>

           
            <!-- e almasena informacion del programa temporalmente que se ira a actualizar o modificar -->
            <input type="hidden" name="ficha_i" id="fichai" value="fichai">
            <div class="am">
                <!-- este es el formulario que le muestra al uuario para poder modificar los campos -->
                <!-- id programa -->
                <td><input type="text" id="ficha" value="" name="id" placeholder="id programa " required></td>
                <!-- nombre del programa -->
               <td> <input type="text" id="c" value="" name="edi" placeholder=" programa" required></td>
                <!-- ct aprendizes -->
               <td> <input type="text" id="ct_aprendiz" value="" name="ct_aprendiz" placeholder="ct_aprendiz" /></td>
<td>
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
                </td>
                <td>
                <!-- lista de tipos de formacion que hay registrados -->
                <select name='formacion' id="f" class="form-control" >
                    <option> </option>
                    <?php
                    //Vincular con la tabla tipo_formacion y extraer datos
                    $query = $mysqli->query("SELECT * FROM tipo_formacion");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option  value="' . $valores['id_formacion'] . '">' . $valores['t_formacion'] . '</option>';
                    }
                    ?>
                    <!--fin select-->
                </select></td>
               
            </div>
            </tbody>
        </table>
        <button type="submit" value="enviar">enviar</button>
        </form>


    </div>