<?php


require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


include("class/conexion.php");
$conexion = Conex::conectar();
$consulta = "SELECT * FROM
programas INNER JOIN prestamo_ambientes AS prestamo on programas.ficha=prestamo.ficha
INNER JOIN ambiente ON ambiente.id_ambiente = prestamo.id_ambiente
INNER JOIN piso ON piso.id_piso = ambiente.id_piso
INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
INNER JOIN sede ON sede.id_sede = bloque.id_sede
INNER JOIN prog_inst ON programas.ficha = prog_inst.ficha
INNER JOIN instructores ON instructores.documento = prog_inst.documento";

$resultado = $conexion->query($consulta);
$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("registro");

$hojaActiva->getColumnDimension('A')->setWidth(20);
$hojaActiva->setCellValue('A1','SEDE');
$hojaActiva->getColumnDimension('B')->setWidth(20);
$hojaActiva->setCellValue('B1','BLOQUE');
$hojaActiva->getColumnDimension('C')->setWidth(20);
$hojaActiva->setCellValue('C1','PISO');
$hojaActiva->getColumnDimension('D')->setWidth(20);
$hojaActiva->setCellValue('D1','AMBIENTE');
$hojaActiva->getColumnDimension('E')->setWidth(20);
$hojaActiva->setCellValue('E1','FECHA');
$hojaActiva->getColumnDimension('F')->setWidth(25);
$hojaActiva->setCellValue('F1','HORARIO');
$hojaActiva->getColumnDimension('G')->setWidth(25);
$hojaActiva->setCellValue('G1','FICHA');
$hojaActiva->getColumnDimension('H')->setWidth(18);
$hojaActiva->setCellValue('H1','PROGRAMA');
$hojaActiva->getColumnDimension('I')->setWidth(25);
$hojaActiva->setCellValue('I1','LUNES	');
$hojaActiva->getColumnDimension('J')->setWidth(40);
$hojaActiva->setCellValue('J1','MARTES');
$hojaActiva->getColumnDimension('K')->setWidth(40);
$hojaActiva->setCellValue('K1','MIERCOLES');
$hojaActiva->getColumnDimension('L')->setWidth(40);
$hojaActiva->setCellValue('L1','JUEVES');
$hojaActiva->getColumnDimension('M')->setWidth(40);
$hojaActiva->setCellValue('M1','VIERNES');
$hojaActiva->getColumnDimension('N')->setWidth(40);
$hojaActiva->setCellValue('N1','SABADO');
$hojaActiva->getColumnDimension('O')->setWidth(40);
$hojaActiva->setCellValue('O1','DOMINGO');
$hojaActiva->getColumnDimension('P')->setWidth(40);
$hojaActiva->setCellValue('P1','CANTIDAD DE APRENDICES');

$fila = 2;

while($row= $resultado->fetch_assoc()) {

    $hojaActiva->setCellValue('A'.$fila, $row['n_sede']);
    $hojaActiva->setCellValue('B'.$fila, $row['n_bloque']);
    $hojaActiva->setCellValue('C'.$fila, $row['n_piso']);
    $hojaActiva->setCellValue('D'.$fila, $row['n_ambiente']);
    $hojaActiva->setCellValue('E'.$fila, $row['fecha_inicio'].' / '.$row['fecha_fin']);
    $hojaActiva->setCellValue('F'.$fila, $row['hora_inicio'].' / '.$row['hora_fin']);
    $hojaActiva->setCellValue('G'.$fila, $row['ficha']);
    $hojaActiva->setCellValue('H'.$fila, $row['n_programa']);
    $hojaActiva->setCellValue('I'.$fila, $row['lunes']);
    $hojaActiva->setCellValue('J'.$fila, $row['martes']);
    $hojaActiva->setCellValue('K'.$fila, $row['miercoles']);
    $hojaActiva->setCellValue('L'.$fila, $row['jueves']);
    $hojaActiva->setCellValue('M'.$fila, $row['viernes']);
    $hojaActiva->setCellValue('N'.$fila, $row['sabado']);
    $hojaActiva->setCellValue('O'.$fila, $row['domingo']);
    $hojaActiva->setCellValue('P'.$fila, $row['cantidad_aprendizes']);
    
    $fila++;
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="informe.Xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;

?>