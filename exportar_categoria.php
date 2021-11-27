<?php 
require_once 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$mysqli = new mysqli("localhost","tesis_user","L]-}!uBqbh+%","tesis_medical");

$objPHPExcel->
getProperties()
->setCreator("Medical")
->setLastModifiedBy("Medical")
->setTitle("Medical")
->setSubject("Medical")
->setDescription("Medical")
->setKeywords("Medical")
->setCategory("Medical");

$w=2;

 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'FECHA')
    ->setCellValue('B1', 'PRODUCTO')
    ->setCellValue('C1', 'CATEGORIA')
    ->setCellValue('D1', 'STOCK')
    ->setCellValue('E1', 'PRECIO DE COMPRA')
    ->setCellValue('F1', 'PRECIO DE VENTA');

if($_GET['id_categoria']=="0")
{
    $slq = $mysqli->query(" select titulo,fecha,precio_compra,precio_venta,categoria,detalle_entradas.stock from entradas,detalle_entradas,productos,categorias where  entradas.id=detalle_entradas.fkentrada and  productos.id=detalle_entradas.fkproducto and categorias.id=productos.fkcategoria and fecha between '".$_GET['fecha_inicial']."' and '".$_GET['fecha_final']."'  order by fecha asc ");

          
}else
{
       $slq = $mysqli->query(" select titulo,fecha,precio_compra,precio_venta,categoria,detalle_entradas.stock from entradas,detalle_entradas,productos,categorias where  entradas.id=detalle_entradas.fkentrada and  productos.id=detalle_entradas.fkproducto and categorias.id=productos.fkcategoria and productos.fkcategoria=".$_GET['id_categoria']." and fecha between '".$_GET['fecha_inicial']."' and '".$_GET['fecha_final']."'  order by fecha asc ");
}



while ($row = $slq->fetch_assoc()) 
{
   
   $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$w, date("d/m/y",strtotime($row['fecha'])))
    ->setCellValue('B'.$w, utf8_encode($row['titulo']))
    ->setCellValue('C'.$w, utf8_encode($row['categoria']))
    ->setCellValue('D'.$w, $row['stock'])
    ->setCellValue('E'.$w, $row['precio_compra'])
    ->setCellValue('F'.$w, $row['precio_venta']);

 $w++;
 }


$objPHPExcel->getActiveSheet()->setTitle('Requerimiento');
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);


    // indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Exportar_Reporte_Categoria.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
?>