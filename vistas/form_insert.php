<?php
function insert_bloque($id){

echo '<div class="popup" id="popup">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <h3>agregar bloque</h3>



            <form action="../controladores/inser_bloque.php" method="GET" id="form">
                        <input type="hidden" name="sede" value="'.$id.'">
                <fieldset>
                    <div class="sentra">
                        <div class="n_bloque">
                            <input type="text" name="bloque1" placeholder="bloque ">
                        </div>
                        <div class="piso">


                            <input type="text" name="piso11" placeholder=" piso ">
                            <hr>
                            <div id="ambientes1">
                                <input type="text" name="ambiente111" placeholder=" ambiente ">

                            </div>
                            <input onclick="Agregarambiente1(1);" type="button" value="+ ambiente" style="background-color: #27AE60; color:white;" class="btn btn-primary" />
                        </div>
                        <!-- espacio para crear mas campos de pisos -->
                        <div id="pisoss1">

                        </div>
                        <button onclick="Agregarpiso1(1,1);" type="button">+ pisos</button><br>
                    </div>

                    <div id="sentra">

                    </div>


                    <br>
                    <button onclick="Agregarbloque();" type="button">bloques</button>

                    <button type="submit" value="enviar">enviar</button>


                </fieldset>
            </form>


        </div>';
      

    
}
function insert_piso($sede){

    echo '<div class="popup2" id="popup2">
                <a href="#" id="btn-cerrar-popup2" class="btn-cerrar-popup2"><i class="fas fa-times"></i></a>
                <h3>agregar piso</h3>
    
    
    
                <form action="../controladores/inser_piso.php" method="GET" id="form">
                            <input type="hidden" name="sede" value="'.$sede.'">
                            <input type="hidden" name="bloque" id="cambio1" value="0">
                    <fieldset>
                        <div class="sentra">
                            
                            <div class="piso">
    
    
                                <input type="text" name="piso11" placeholder=" piso ">
                                <hr>
                                <div id="ambiente1">
                                    <input type="text" name="ambiente111" placeholder=" ambiente ">
    
                                </div>
                                <input onclick="Agregarambiente(1);" type="button" value="+ ambiente" style="background-color: #27AE60; color:white;" class="btn btn-primary" />
                            </div>
                            <!-- espacio para crear mas campos de pisos -->
                            <div id="pisos1">
    
                            </div>
                           
                        </div>
    
                        <div id="sentra">
    
                        </div>
    
    
                        <br> <button onclick="Agregarpiso(1,1);" type="button">+ pisos</button>
    
                        <button type="submit" value="enviar">enviar</button>
    
    
                    </fieldset>
                </form>
    
    
            </div>';
          
    
        
    }
    function insert_ambiente($sede){

        echo '<div class="popup3" id="popup3">
                    <a href="#" id="btn-cerrar-popup3" class="btn-cerrar-popup3"><i class="fas fa-times"></i></a>
                    <h3>agregar ambiente</h3>
        
        
        
                    <form action="../controladores/inser_ambiente.php" method="GET" id="form">
                                <input type="hidden" name="sede" value="'.$sede.'">
                                <input type="hidden" name="piso" id="cambio2" value="0">
                        <fieldset>
                            <div class="sentra">
                                
                                
                                    
                                    <div id="ambientefin">
                                        <input type="text" name="ambiente111" placeholder=" ambiente ">
        
                                    </div>
                                    <input onclick="Agregarambiente3();" type="button" value="+ ambiente" style="background-color: #27AE60; color:white;" class="btn btn-primary" />
                                <!-- espacio para crear mas campos de pisos -->
                               
                            </div>
                            <button type="submit" value="enviar">enviar</button>
        
        
                        </fieldset>
                    </form>
        
        
                </div>';
              
        
            
        }
        function edid($sede){

            echo '<div class="popup4" id="popup4">
                        <a href="#" id="btn-cerrar-popup4" class="btn-cerrar-popup4"><i class="fas fa-times"></i></a>
                        <h3>editar ambiente</h3>
            
            
            
                        <form action="../controladores/editar.php" method="GET" id="form">
                                    <input type="hidden" name="sede" value="'.$sede.'">
                                    <input type="hidden" name="id" id="cambio3" value="0">
                                    <input type="hidden" name="campo"  value="n_ambiente">
                                    <input type="hidden" name="campo1"  value="id_ambiente">
                                    <input type="hidden" name="tabla" id="cambio4"  value="0 ">
                            <div class="am">
                                        
                                            <input type="text" id="cambio5" value="" name="edi" placeholder=" ambiente ">
                                            <button type="submit" value="enviar">enviar</button>
                            </div>
                            
                        </form>
            
            
                    </div>';
                  
            
                
            }
            // funcion para editar el nombre de la sede
            function edid2($sede){

                echo '<div class="popup5" id="popup5">
                            <a href="#" id="btn-cerrar-popup5" class="btn-cerrar-popup5"><i class="fas fa-times"></i></a>
                            <h3>editar sede</h3>
                
                
                
                            <form action="../controladores/editar.php" method="GET" id="form">
                                        <input type="hidden" name="sede" value="'.$sede.'">
                                        <input type="hidden" name="id" value="'.$sede.'">
                                        <input type="hidden" name="campo"  value="n_sede">
                                        <input type="hidden" name="campo1"  value="id_sede">
                                        <input type="hidden" name="tabla"  value="sede">
                                <div class="am">
                                            
                                                <input type="text" id="cambio6" value="" name="edi" placeholder=" ambiente ">
                                                <button type="submit" value="enviar">enviar</button>
                                </div>
                                
                            </form>
                
                
                        </div>';
                      
                
                    
                }
    