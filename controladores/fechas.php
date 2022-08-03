<?php
//damh
//----------------------------ejemplo borra cuando termine----------------------------------------------------------------------\\
$dek="";


$dek .= "<tr id='bor_s'>
<th  COLSPAN='2'><b>enero</b></th>
<th COLSPAN='2' id='bor_s'><b>febrero</b></th>
<th COLSPAN='2' id='bor_s'><b>marzo</b></th>
<th COLSPAN='2' id='bor_s'><b>abril</b></th>
<th COLSPAN='2' id='bor_s'><b>mayo</b></th>
<th COLSPAN='2' id='bor_s'><b>junio</b></th>
<th COLSPAN='2' id='bor_s'><b>julio</b></th>
<th COLSPAN='2' id='bor_s'><b>agosto</b></th>
<th COLSPAN='2' id='bor_s'><b>septiembre</b></th>
<th COLSPAN='2' id='bor_s'><b>octubre</b></th>
<th COLSPAN='2' id='bor_s'><b>noviembre</b></th>
<th COLSPAN='2' id='bor_s'><b>diciembre</b></th>
<th rowspan='2' id='bor_s'><b>total dias</b></th>
<th rowspan='2' id='bor_s'><b>total horas</b></th>

</tr>";

$dek .= "<tr>";


for ($col=0; $col < 12; $col++) { 
    $dek .="<td>dias</td><td>horas</td>";
}

$dek .="</tr>";

$diasselc="";
$l=$_GET['l'];
$mar=$_GET['mar'];
$mir=$_GET['mir'];
$j=$_GET['j'];
$v=$_GET['v'];
$s=$_GET['s'];     
$d=$_GET['d'];  

if ($l==1) {
    $diasselc .="monday";
}
if ($mar==1) {
    $diasselc .=",Tuesday";
}
if ($mir==1) {
    $diasselc .=",Wednesday";
}
if ($j==1) {
    $diasselc .=",Thursday";
}
if ($v==1) {
    $diasselc .=",Friday";
}
if ($s==1) {
    $diasselc .=",Saturday";
}
if ($d==1) {
    $diasselc .=", Sunday";
}
//se sabe que dias son os que son selcionados para poder realizar el conteo de los dias trabajado en los meses
$diasep=explode(",",$diasselc);
$tdias =count($diasep);


//------------------------------difencia de horas---------------------------------------------
$hora_i=$_GET['h_i']; 
$hora_f=$_GET['h_f'];
$ti= explode(":",$hora_i);
$tf= explode(":",$hora_f);


 $ti_s=$ti[2];
 $ti_m=$ti[1];
 $ti_h=$ti[0];

 $tf_s=$tf[2];
 $tf_m=$tf[1];
 $tf_h=$tf[0];

 if ($tf_s < $ti_s) {
     $tf_s=$tf_s+60;
     $tf_m= $tf_m-1;
     $tiempo_s= $tf_s-$ti_s;
 }else{ $tiempo_s= $tf_s-$ti_s;}

 if ($tf_m < $ti_m) {
    $tf_m=$tf_m+60;
    $tf_h= $tf_h-1;
    $tiempo_m= $tf_m-$ti_m;
}else{ $tiempo_m= $tf_m-$ti_m;}
 $tiempo_h= $tf_h-$ti_h;



//-----------------------------calculo de dias trabajados--------------------------------------------------------------------
$fecha_i=$_GET['fecha_i'];
$fecha_f=$_GET['fecha_f'];
//los meses se traen por get y s pasan a numeros enteros para poder realizar las operaciones de conteos de dias



$fechaInicio=strtotime($fecha_i);
$fechaFin=strtotime($fecha_f);

//variables para almasenar los dias de cada mes por separado para porder sacar las horas de los meses por separado
$e=0;
$fe=0;
$mz=0;
$ab=0;
$my=0;
$jn=0;
$jl=0;
$ag=0;
$sep=0;
$oc=0;
$nv=0;
$dc=0;

//esta variable es para almasenar la cantidad total de dias trabajados en las fechas establecidas
$a=0;
if ($_GET['fecha_i']!="" || $_GET['fecha_f'] !="" ) {
    # code...

//siclo que busca cada dia selecionado entre las fechas establecidas anteriormente
for ($semana=0; $semana < $tdias; $semana++) { 
    //Recorro las fechas y con la función strotime obtengo los dias establecidos
    for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400 * 7){

        $exis= strtotime($diasep[$semana], $i);
        $mes = date("m", $exis);
        
        //se decide si las fechas de los dias estan entre las fechas selecionadas, si se cumple esta decicion se va incrementando los dias 
        if ($exis >= $fechaInicio) {
            $a++;
            if ($mes=="01") {$e++;}
            if ($mes=="02") {$fe++;}
            if ($mes=="03") {$mz++;}
            if ($mes=="04") {$ab++;}
            if ($mes=="05") {$my++;}
            if ($mes=="06") {$jn++;}
            if ($mes=="07") {$jl++;}
            if ($mes=="08") {$ag++;}
            if ($mes=="09") {$sep++;}
            if ($mes=="10") {$oc++;}
            if ($mes=="11") {$nv++;}
            if ($mes=="12") {$dc++;}
        }
        //esta decion es parecia a la anterior si no de sumar esta resta
        if ($exis > $fechaFin) {
            $a--;
            
            if ($mes=="01") {$e--;}
            if ($mes=="02") {$fe--;}
            if ($mes=="03") {$mz--;}
            if ($mes=="04") {$ab--;}
            if ($mes=="05") {$my--;}
            if ($mes=="06") {$jn--;}
            if ($mes=="07") {$jl--;}
            if ($mes=="08") {$ag--;}
            if ($mes=="09") {$sep--;}
            if ($mes=="10") {$oc--;}
            if ($mes=="11") {$nv--;}
            if ($mes=="12") {$dc--;}
        }
    }
}
}

for ($i=1; $i <=12; $i++) { 
    if ($i==1) { $dias=$e;}
    if ($i==2) { $dias=$fe;}
    if ($i==3) { $dias=$mz;}
    if ($i==4) { $dias=$ab;}
    if ($i==5) { $dias=$my;}
    if ($i==6) { $dias=$jn;}
    if ($i==7) { $dias=$jl;}
    if ($i==8) { $dias=$ag;}
    if ($i==9) { $dias=$sep;}
    if ($i==10) { $dias=$oc;}
    if ($i==11) { $dias=$nv;}
    if ($i==12) { $dias=$dc;}

    $d_s=$tiempo_s*$dias;
    $d_m=$tiempo_m*$dias;
    $d_h=$tiempo_h*$dias;
    $d_sf= fmod ($d_s, "60");
    $dv=$d_s / 60;
    $dv= explode(".",$dv);
    $d_m=$d_m+$dv[0];
    $d_mf= fmod ($d_m, "60");
    $dv_m=$d_m / 60;
    $dv_m= explode(".",$dv_m);
    $d_h=$d_h+$dv_m[0];
    if (strlen($d_sf) ==1) {$d_sf="0".$d_sf;}
    if (strlen($d_mf) ==1) {$d_mf="0".$d_mf;}
    if (strlen($d_h) ==1) {$d_h="0".$d_h;}
    $trabajadas= $d_h.":".$d_mf.":".$d_sf;

    if ($d_h==00 & $d_mf==00 & $d_sf==00) {
        $trabajadas="0";
    }
    $dek .= "<td>".$dias."</td><td>".$trabajadas."</td>";

 }

//total de hras rabajadas en el tiempo establecido 

$dias=$a;
$d_s=$tiempo_s*$dias;
$d_m=$tiempo_m*$dias;
$d_h=$tiempo_h*$dias;
$d_sf= fmod ($d_s, "60");
$dv=$d_s / 60;
$dv= explode(".",$dv);
$d_m=$d_m+$dv[0];
$d_mf= fmod ($d_m, "60");
$dv_m=$d_m / 60;
$dv_m= explode(".",$dv_m);
$d_h=$d_h+$dv_m[0];
if (strlen($d_sf) ==1) {$d_sf="0".$d_sf;}
if (strlen($d_mf) ==1) {$d_mf="0".$d_mf;}
if (strlen($d_h) ==1) {$d_h="0".$d_h;}

$trabajadas= $d_h.":".$d_mf.":".$d_sf;
$dek .= "<td>".$a."</td>";
$dek .= "<td>".$trabajadas."</td>";

echo $dek;