<script src="../js/jquery-3.1.1.min.js"></script>
<div class="popup5" id="popup5">
    <a href="#" id="btn-cerrar-popup5" class="btn-cerrar-popup5"><i class="fas fa-times"></i></a>
    <h3>editar profeciones</h3>



    <form action="..\controladores\editar_profeciones.php" method="GET" id="form">
    <input type="hidden" name="id" id="id" value="id_profecion">
       
        <table class="table">
            <thead>
                <th>profecion</th>
            </thead>
            <tbody>
                <div class="am">
                    
                  <td><input type="text" id="profecion" name="profecion" value="profecion"></td>

                </div>
            </tbody>
        </table>
        <button type="submit" value="enviar">enviar</button>
    </form>


</div>