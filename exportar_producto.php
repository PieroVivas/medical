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
    ->setCellValue('C1', 'PROVEEDOR')
    ->setCellValue('D1', 'PRECIO DE COMPRA')
    ->setCellValue('E1', 'PRECIO DE VENTA');

if($_GET['id_producto']=="0")
{
    $slq = $mysqli->query(" select titulo,fecha,precio_compra,precio_venta,razon from entradas,detalle_entradas,productos,proveedores where  entradas.id=detalle_entradas.fkentrada and  productos.id=detalle_entradas.fkproducto and proveedores.id=entradas.fkproveedor and fecha between '".$_GET['fecha_inicial']."' and '".$_GET['fecha_final']."'  order by fecha asc ");

          
}else
{
       $slq = $mysqli->query(" select titulo,fecha,precio_compra,precio_venta,razon from entradas,detalle_entradas,productos,proveedores where  entradas.id=detalle_entradas.fkentrada and  productos.id=detalle_entradas.fkproducto and proveedores.id=entradas.fkproveedor and productos.id='".$_GET['id_producto']."' and fecha between '".$_GET['fecha_inicial']."' and '".$_GET['fecha_final']."' order by fecha asc ");
}



while ($row = $slq->fetch_assoc()) 
{
   
   $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$w, date("d/m/y",strtotime($row['fecha'])))
    ->setCellValue('B'.$w, utf8_encode($row['titulo']))
    ->setCellValue('C'.$w, $row['razon'])
    ->setCellValue('D'.$w, $row['precio_compra'])
    ->setCellValue('E'.$w, $row['precio_venta']);

 $w++;
 }


$objPHPExcel->getActiveSheet()->setTitle('Requerimiento');
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);



    // indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Exportar_Reporte_Producto.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
?>