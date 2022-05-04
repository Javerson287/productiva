<?php
$sede= $_GET['sede'];
$b=1;
$p=1;
$a=1;
$bloque="";
$b_pisos="";
$b_ambientes="";

include ('busqueda.php');
insert($sede);
$id_sede=sede($sede);
while ($b <= 20) {
    if(isset($_GET["bloque$b"]))
    {
        
        $bloque= $_GET["bloque$b"];
        insert_b($bloque, $id_sede);
        $id_bloque= bloque($bloque, $id_sede);

        
        //busac si tiene pisos en bloque
        while ($p <= 50) {
            

            if (isset($_GET["piso$b$p"])){
                $piso= $_GET["piso$b$p"];

                insert_p($piso,$id_bloque);
                 $id_piso= piso($piso, $id_bloque );
                
                
                //busca si tiene ambientes el piso
                while ($a <= 50) {

                    if (isset($_GET["ambiente$b$p$a"])){
                        $ambiente= $_GET["ambiente$b$p$a"];
                        insert_a($ambiente, $id_piso);
                    }
                    $a++;
                }
                $a=0;        
                
            }
            $p++;
            
        }
        $p=0;
       
    }
    $b++;
    
}
header('location:    ../vistas/editar_sede.php');