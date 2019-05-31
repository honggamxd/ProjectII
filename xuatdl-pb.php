<?php
require ('PHPExcel-1.8/Classes/PHPExcel.php');
require ('Server.php');
    $PHPExcel = new PHPExcel();

    $PHPExcel->setActiveSheetIndex(0);

    $PHPExcel->getActiveSheet()->setTitle('Phòng ban');
    $PHPExcel->getActiveSheet()->setCellValue('C1', 'DỮ LIỆU PHÒNG BAN');
    $PHPExcel->getActiveSheet()->setCellValue('F41', 'Nhân viên ký tên');
    $PHPExcel->getActiveSheet()->setCellValue('F42', '(Ký, ghi rõ họ tên)');

    $PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
    $PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
    $PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);

    $PHPExcel->getActiveSheet()->getStyle('A3:E3')->getFont()->setBold(true);

    $PHPExcel->getActiveSheet()->setCellValue('A3', 'STT');
    $PHPExcel->getActiveSheet()->setCellValue('B3', 'Địa điểm');
    $PHPExcel->getActiveSheet()->setCellValue('C3', 'Tên phòng');
    $PHPExcel->getActiveSheet()->setCellValue('D3', 'Diện tích');
    $PHPExcel->getActiveSheet()->setCellValue('E3', 'Đơn vị SD');

$rowNumber = 4;
$values = getPhongban();
foreach ($values as $index => $item)
{

    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));

    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item['Diadiem']);

    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item['TenP']);

    $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item['Dientich']);

    $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item['ĐVSD']);

    $rowNumber++;
}
$objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
$filename ='dulieuPhongban.xlsx';
$objWriter->save($filename);

header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Length: '.filesize($filename));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
readfile($filename);
return;
?>