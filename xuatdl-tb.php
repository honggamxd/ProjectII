<?php
require('PHPExcel-1.8/Classes/PHPExcel.php');
require('Server.php');
$PHPExcel = new PHPExcel();

$PHPExcel->setActiveSheetIndex(0);

$PHPExcel->getActiveSheet()->setTitle('Thiết bị');

$PHPExcel->getActiveSheet()->setCellValue('E1', 'DỮ LIỆU THIẾT BỊ');
$PHPExcel->getActiveSheet()->setCellValue('J23', 'Nhân viên ký tên');
$PHPExcel->getActiveSheet()->setCellValue('J24', '(Ký, ghi rõ họ tên)');

$PHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
$PHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
$PHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17);
$PHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(57);
$PHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(12);
$PHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
$PHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(12);



$PHPExcel->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true);

$PHPExcel->getActiveSheet()->setCellValue('A3', 'STT');
$PHPExcel->getActiveSheet()->setCellValue('B3', 'Địa điểm');
$PHPExcel->getActiveSheet()->setCellValue('C3', 'ĐVSD');
$PHPExcel->getActiveSheet()->setCellValue('D3', 'Mã TB');
$PHPExcel->getActiveSheet()->setCellValue('E3', 'Tên TB');
$PHPExcel->getActiveSheet()->setCellValue('F3', 'Số lượng');
$PHPExcel->getActiveSheet()->setCellValue('G3', 'Năm sử dụng');
$PHPExcel->getActiveSheet()->setCellValue('H3', 'Trạng thái');
$PHPExcel->getActiveSheet()->setCellValue('I3', 'Ghi chú');


$rowNumber = 4;
$values = getTB();
foreach ($values as $index => $item) {

    $PHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, ($index + 1));

    $PHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item['Diadiem']);

    $PHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item['ĐVSD']);

    $PHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item['codetb']);

    $PHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item['tenTB']);

    $PHPExcel->getActiveSheet()->setCellValue('F' . $rowNumber, $item['Soluong']);

    $PHPExcel->getActiveSheet()->setCellValue('G' . $rowNumber, $item['Namsd']);

    $PHPExcel->getActiveSheet()->setCellValue('H' . $rowNumber, $item['Trangthai']);

    $PHPExcel->getActiveSheet()->setCellValue('I' . $rowNumber, $item['Ghichu']);

    $rowNumber++;
}
$objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
$filename = 'dulieuThietbi.xlsx';
$objWriter->save($filename);

header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize($filename));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: no-cache');
readfile($filename);
return;
?>