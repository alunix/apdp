<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 1/15/19
 * Time: 8:54 PM
 */


$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header(sprintf('Content-Disposition: attachment; filename="export-data-warga-%s.xlsx"', date('Y-m-d-H-i-s')));



$headers = array(
    'No', 'No KK', 'NIK', 'Nama', 'Jenis Kelamin',
    'Tanggal Lahir', 'Kewarganegaraan', 'Agama', 'Pendidikan', 'Pekerjaan', 'Status Nikah',
    'Status Keluarga', 'Gol. Darah', 'Nama Ayah', 'Nama Ibu', 'Alamat', 'Provinsi', 'Kabupaten', 'Kecamatan', 'Desa',
    'RT', 'RW'
);

foreach ($headers as $key => $header) {
    $sheet->setCellValue(columnLetter(2+$key).'2' , $header)
        ->getStyle(columnLetter(2+$key).'2')
        ->getFont()->setBold(true);
    $sheet->getColumnDimension(columnLetter(2+$key))->setAutoSize(true);
}



$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save("php://output");