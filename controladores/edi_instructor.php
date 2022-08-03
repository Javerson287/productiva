<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="popup5" id="popup5">
    <a href="#" id="btn-cerrar-popup5" class="btn-cerrar-popup5"><i class="fas fa-times"></i></a>
    <h3>editar instructor</h3>



    <form action="../controladores/editar2.php" method="GET" id="form">
        <input type="hidden" name="campo" value="n_instructor">
        <input type="hidden" name="campo1" id="cambio8" value="documento">
        <input type="hidden" name="tabla" value="instructores">
        <table class="table">
            <thead>
                <th>NO documento</th>
                <th>Nombre y Apellidos</th>
                <th>profecion</th>
            </thead>
            <tbody>
                <div class="am">
                    <td> <input type="text" id="cambio7" value="" name="edi_intructor"></td>
                    <td> <input type="text" id="cambio6" value="" name="edi"></td>
                    <td>
                        <select name='profecion' id="inputState selectLang" class="form-control" >
                            <option>  </option>

                            <?php
                            //Vincular con la tabla y extraer datos
                            $query = $mysqli->query("SELECT * FROM profesiones");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<option value="' . $valores['id_profesiones'] . '">' . $valores['n_profesiones'] . '</option>';
                            }
                            ?>
                            <!--fin select-->
                        </select>
                    </td>


                </div>
            </tbody>
        </table>
        <button type="submit" value="enviar">enviar</button>
    </form>


</div>