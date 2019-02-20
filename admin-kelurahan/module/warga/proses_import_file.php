<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 2/20/19
 * Time: 10:46 PM
 */
$file_id = @$_GET['file_id'];
if ($file_id) {
    $file = _getOneData("uploaded_file", "id='$file_id'");
    if ($file) {
        $file_location = BASE_DIR.$file['lokasi_file'];
        $total = 0;
        $success_total = 0;
        $custom_keterangan = "";
        if (file_exists($file_location)) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_location);
            $count = $spreadsheet->getSheetCount();

            for ($sheet=0;$sheet < $count;$sheet++) {
                $sheetData = $spreadsheet->getSheet($sheet);
                $sheetData = $sheetData->toArray();
                foreach ($sheetData as $key => $sheetDatum) {
                    $total++;
                    $nomor_excel = @$sheetDatum[0];
                    if ($key==0) continue;
                    if (!@$sheetDatum[1]) {
                        $custom_keterangan .= "No KK dengan nomor $nomor_excel kosong";
                        continue;
                    }
                    if (!@$sheetDatum[2]) {
                        $custom_keterangan .= "NIK dengan nomor $nomor_excel kosong";
                        continue;
                    }
                    if (@$sheetDatum[1] && @$sheetDatum[2]) {
                        $nik = @$sheetDatum[2];
                        $exists = _getOneData("data_warga", "nik='$nik'");
                        if ($exists) continue;
                        $no_kk = @$sheetDatum[1];
                        $nama = @$sheetDatum[3];
                        $jk = @$sheetDatum[4]=="L"?"Laki-laki":@$sheetDatum[4];
                        if ($jk!="Laki-laki") @$sheetDatum[4]=="P"?"Perempuan":@$sheetDatum[4];
                        $tempat_lhr = @$sheetDatum[5];
                        $tanggal_lhr = @$sheetDatum[6];
                        $tanggal_lhr_array = explode("/", $tanggal_lhr);
                        $tanggal_lhr = implode("-", array_reverse($tanggal_lhr_array));
                        $gol_dar = @$sheetDatum[7];
                        $kewarganegaraan = 'wni';
                        $agama = @$sheetDatum[8];
                        if ($agama) {
                            $agamaDb = _getOneData("agama", "nama_agama='$agama'");
                            if (!$agamaDb) {
                                _insertData("agama", array(
                                    'nama_agama' => $agama,
                                ));
                                $agamaDb = _getOneData("agama", "nama_agama='$agama'");
                            }
                            $agama = @$agamaDb['id_agama'];
                        }

                        $pendidikan = @$sheetDatum[11];
                        if ($pendidikan) {
                            $pendidikanDb = _getOneData("pendidikan", "nama_pendidikan='$pendidikan'");
                            if (!$pendidikanDb) {
                                _insertData("pendidikan", array(
                                    'nama_pendidikan' => $pendidikan,
                                ));
                                $pendidikanDb = _getOneData("pendidikan", "nama_pendidikan='$pendidikan'");
                            }
                            $pendidikan = @$pendidikanDb['id_pendidikan'];
                        }

                        $pekerjaan = @$sheetDatum[12];
                        if ($pekerjaan) {
                            $pekerjaanDb = _getOneData("pekerjaan", "nama_pekerjaan='$pekerjaan'");
                            if (!$pekerjaanDb) {
                                _insertData("pekerjaan", array(
                                    'nama_pekerjaan' => $pekerjaan,
                                ));
                                $pekerjaanDb = _getOneData("pekerjaan", "nama_pekerjaan='$pekerjaan'");
                            }
                            $pekerjaan = @$pekerjaanDb['id_pekerjaan'];
                        }
                        $status_nikah = @$sheetDatum[9];
                        $status_keluarga = @$sheetDatum[10];
                        $nama_ayah = @$sheetDatum[14];
                        $nama_ibu = @$sheetDatum[13];
                        $alamat = @$sheetDatum[15];
                        $rt = @$sheetDatum[16];
                        $rw = @$sheetDatum[17];
                        $desa_id = @getMultipleDesaId()[0];
                        $lastId = _getOneData("data_warga", "1=1", "id",NULL, "ID DESC", "LIMIT 0, 1");
                        $lastId = $lastId['id'];
                        $numId = (int) substr($lastId, 2);
                        $nextId = $numId+1;
                        $id = "ID".str_repeat("0", 5-strlen($nextId)).$nextId;
//                        $uploaded_file_id = $file[1];
                        $status = _insertData("data_warga", compact(
                            'id',
                            'nik', 'no_kk',
                            'nama', 'jk', 'tempat_lhr', 'tanggal_lhr', 'gol_dar',
                            'kewarganegaraan', 'agama', 'pendidikan', 'pekerjaan',
                            'status_nikah', 'status_keluarga', 'nama_ayah',
                            'nama_ibu', 'alamat', 'rt', 'rw', 'desa_id'
//                            'uploaded_file_id'
                        ));
                        if (!$status) continue;
                        $success_total++;
                    }
                }
            }


        }
        $processed = 1;
        $status_prosess = 1;
        $total--;
        $keterangan = "Memproses $success_total from $total data. $custom_keterangan";
        _updateData(
            'uploaded_file',
            compact('processed', 'status_prosess', 'keterangan'),
            "id='$file_id'"
        );
    }
}
redirectJs(moduleUrlByLevel('warga', 'aksi=import'));