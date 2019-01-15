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
            <li>Download template file excel ini : <a href="">Template</a></li>
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

        if (isset($proccess)) {

        }
        ?>

    </div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA WARGA ------------------------- ----->
