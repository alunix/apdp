<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 12/22/18
 * Time: 10:10 AM
 */

?>
    <div class="text-center">
        <h3>Import Data</h3><hr/>
    </div>
<div class="box box-solid box-success">
    <div class="box-header">
        <h3 class="btn btn disabled box-title">
            <i class="fa  fa-file-excel-o"></i> Import Excel </h3>

        <a class="btn btn-default pull-right"href="?module=warga">
            <i class="fa  fa-backward"></i> Kembali</a>

    </div>
    <div class="box-body">
        <p>
            <strong>Panduan Import Excel</strong>
        </p>
        <ul>
            <li>Download template file excel ini : <a href="<?=baseUrlByLevel("template.xlsx");?>">Template</a></li>
            <li>Sesuaikan data yang akan diimport dengan file excel yang telah di download</li>
            <li>Kemudian upload kembali data pada form dibawah panduan ini.</li>
            <li><span class="text-danger">Data yang valid saja yang hanya akan berhasil diupload</span></li>
        </ul>


        <form action="?module=warga&aksi=import&buffer=start" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="exampleInputFile">Form Upload File</label>
                <input type="file" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">

                <p class="help-block">Pastikan file yang diupload berasal dari file template.</p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-upload"></i> Upload</button>
            </div>
        </form>

        <?php

        $upload = new Delight\FileUpload\FileUpload();
        $upload->withTargetDirectory(BASE_DIR."file-upload/");
        $upload->from('file');

        try {
            $uploadedFile = $upload->save();
            $tanggal_upload = date('Y-m-d');
            $waktu_upload = date('H:i:s');
            $lokasi_file = "file-upload/".$uploadedFile->getFilenameWithExtension();
            _insertData("uploaded_file", compact(
                    'tanggal_upload', 'waktu_upload', 'lokasi_file'
                )
            );
            ?>
            <script>
                window.location.href=window.location;
            </script>
            <?php
            die();
        } catch (\Delight\FileUpload\Throwable\InputNotFoundException $e) {
            // input not found
        } catch (Exception $e) {

        }
        ?>
        <table class="table table-hover table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Upload</th>
                    <th>Waktu Upload</th>
                    <th>File</th>
                    <th>Status Proses</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $uploaded_files = _fetchMultipleFromSql("SELECT * FROM uploaded_file");
                if (is_array($uploaded_files)) {
                    $no = 1;
                    foreach ($uploaded_files as $uploaded_file) {
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$uploaded_file['tanggal_upload'];?></td>
                            <td><?=$uploaded_file['waktu_upload'];?></td>
                            <td>
                                <?php
                                $file_exists = is_file(BASE_DIR.$uploaded_file['lokasi_file']);
                                if ($file_exists) {
                                    $url = BASE_URL.$uploaded_file['lokasi_file'];
                                    echo "Ditemukan <a href='".$url."' target='_blank'><i class='fa fa-download'></i></a>";
                                } else {
                                    echo "Tidak Ditemukan";
                                }
                                ?>
                            </td>
                            <td>
                                <?=$uploaded_file['keterangan'];?>
                            </td>
                            <td>
                                <?php
                                if ($uploaded_file['processed']) {
                                    echo "Sudah di proses";
                                } else {
                                    echo "Belum di proses";
                                }
                                echo "<br/>";
                                if ($uploaded_file['processed'] && $uploaded_file['status_prosess'] ) {
                                    echo "Proses Berhasil";
                                } else if ($uploaded_file['processed'] && !$uploaded_file['status_prosess']) {
                                    echo "Proses Gagal";
                                }
                                ?>
                            </td>
                            <td>
                                <small>
                                    <?php
                                    if ($uploaded_file['processed']) {
                                        ?>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="<?=moduleUrlByLevel('warga', 'aksi=proses_import_file&buffer=start&file_id='.$uploaded_file['id']);?>" onclick="event.preventDefault();var cf = confirm('Apakah anda yakin akan memproses file ini?');if (cf) window.location.href = this.href;">Proses</a>
                                        <br>
                                        <?php
                                    }
                                    ?>
                                    <a href="<?=moduleUrlByLevel('warga', 'aksi=delete_import_file&buffer=start&file_id='.$uploaded_file['id']);?>" class="text-danger" onclick="event.preventDefault();var cf = confirm('Apakah anda yakin akan menghapus ini?');if (cf) window.location.href = this.href;">Hapus File</a>
                                    <?php
                                    ?>
                                </small>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>

    </div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA WARGA ------------------------- ----->
