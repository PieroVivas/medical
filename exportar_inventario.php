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
    ->setCellValue('A1', 'PRODUCTO')
    ->setCellValue('B1', 'MARCA')
    ->setCellValue('C1', 'CATEGORIA')
    ->setCellValue('D1', 'MEDIDA')
    ->setCellValue('E1', 'STOCK')
    ->setCellValue('F1', 'PRECIO UNIDAD')
    ->setCellValue('G1', 'PRECIO PROMEDIO');


    $slq = $mysqli->query(" select po.id as id,
                            ma.marca,
                            c.categoria,
                            po.titulo,
                            m.medida,
                            po.stock,
                            concat( 'S/. ', round(t0.promedio,2)) as 'Costo Promedio por Unidad' ,
                            concat( 'S/. ',round(t0.promedio*stock,2)) as 'costo promedio total'

                            from productos po
                            inner join medidas m on po.fkmedida=m.id
                            inner join categorias c on po.fkcategoria = c.id
                            inner join marcas ma on po.fkmarca = ma.id
                            inner join (select p.id as Productid,
                            ifnull((select precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1,1),0) as precioActual,
                            (p.stock - ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0)) as stockActual,
                            ifnull((select precio_compra from audi_producto ap where p.id = ap.fkproducto order by ap.id desc limit 1),0) as precioNuevo,
                            ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0) as stockNuevo,
                            ifnull(p.stock,0) as stockTotal,
                            ifnull(
                            (
                                (
                                (
                                    ifnull((select precio_compra from audi_producto ap where ap.fkproducto = p.id order by ap.id desc limit 1,1),0)
                                    *ifnull((p.stock - (select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1)),0)
                                )+
                                (
                                    ifnull((select precio_compra from audi_producto ap where ap.fkproducto = p.id order by ap.id desc limit 1),0)
                                    *ifnull((select dt.stock from detalle_entradas dt where dt.fkproducto = p.id order by p.id desc limit 1),0)
                                    )
                                )/
                            p.stock
                            )
                            ,0) as promedio

                            from productos p
                            left join detalle_entradas de on p.id = de.fkproducto
                            group by p.id) t0 on t0.Productid = po.id
                            order by po.id asc
                            ");




while ($row = $slq->fetch_assoc()) 
{
   
   $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$w, utf8_encode($row['titulo']))
    ->setCellValue('B'.$w, utf8_encode($row['marca']))
    ->setCellValue('C'.$w, utf8_encode($row['categoria']))
    ->setCellValue('D'.$w, $row['medida'])
    ->setCellValue('E'.$w, $row['stock'])
    ->setCellValue('F'.$w, $row['Costo Promedio por Unidad'])
    ->setCellValue('G'.$w, $row['costo promedio total']);

 $w++;
 }


$objPHPExcel->getActiveSheet()->setTitle('Inventario');
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);


    // indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Exportar_Reporte_Inventario.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
?>