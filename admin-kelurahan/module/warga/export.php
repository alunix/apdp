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

$number = 3;

$sql = "SELECT dw.*, a.nama_agama, p.nama_pekerjaan, pd.nama_pendidikan, ".
    "vd.nama_provinsi, vd.nama_kabupaten, vd.nama_kecamatan, vd.nama_desa  ".
    "FROM data_warga dw ".
    "left join agama a on a.id_agama=dw.agama ".
    "left join pekerjaan p on p.id_pekerjaan=dw.pekerjaan ".
    "left join pendidikan pd on pd.id_pendidikan=dw.pendidikan ".
    "left join view_desa vd on vd.id=dw.desa_id ".
    " where ".buildQueryDesaId("'", 'dw').
    " order by dw.desa_id, dw.no_kk, dw.nik";

$key = 0;

$tampil = _query($sql);

while ($data = _fetch_array($tampil)) { // foreach ($datas as $key => $data) {
    $xs = str_split(@$data['no_kk'], 8);
    $xs1 = str_split(@$data['nik'], 8);
    $dataColumn = array(
        ++$key,
        '=CONCATENATE("'.implode('", "', $xs).'")',
        '=CONCATENATE("'.implode('", "', $xs1).'")',
        @$data['nama'],
        @$data['jk'],
        @$data['tanggal_lhr'],
        @$data['kewarganegaraan'],
        @$data['nama_agama'],
        @$data['nama_pendidikan'],
        @$data['nama_pekerjaan'],
        @$data['status_nikah'],
        @$data['status_keluarga'],
        @$data['gol_dar'],
        @$data['nama_ayah'],
        @$data['nama_ibu'],
        @$data['alamat'],
        @$data['nama_provinsi'],
        @$data['nama_kabupaten'],
        @$data['nama_kecamatan'],
        @$data['nama_desa'],
        @$data['rt'],
        @$data['rw'],
    );
    foreach ($dataColumn as $columnKey => $datum) {

        if (in_array($columnKey, array(1, 2))) {
            $sheet->setCellValue(columnLetter(2+$columnKey).$number , $datum)
                ->getStyle(columnLetter(2+$columnKey).$number)
                ->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);
        } else {
            $sheet->setCellValue(columnLetter(2+$columnKey).$number , $datum)
                ->getStyle(columnLetter(2+$columnKey).$number);
            $sheet->getStyle(columnLetter(2+$columnKey).$number)
                ->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_GENERAL);
        }
    }
    $number++;
}


$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save("php://output");