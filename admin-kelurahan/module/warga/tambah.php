<?php
/**
 * Created by PhpStorm.
 * User: tik_squad
 * Date: 12/22/18
 * Time: 10:11 AM
 */


//ID
$sql ="SELECT max(id) as terakhir from data_warga";
  $hasil = _query($sql);
  $data = _fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "ID".sprintf("%03s",$nextNoUrut);
?>
    <!----- ------------------------- TAMBAH DATA WARGA ------------------------- ----->
    <h3 class="box-title margin text-center">Tambah Data Warga</h3>
    <center> <div class="batas"> </div></center>
    <hr/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=warga&aksi=tambah" role="form" method="post">

    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="btn btn disabled box-title">
                <i class="fa fa-user-md"></i> Informasi Data Warga </h3>
            <a class="btn btn-default btn-sm pull-right" style="margin-right: 5px;" href="<?=moduleUrlByLevel('warga');?>">
                <i class="fa fa-times"></i> Batal
            </a>

            <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></a>

        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-4 control-label">ID </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  readonly name="id" value="<?php echo  $nextID; ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NO. KK</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control"  name="no_kk" placeholder="Masukan No. KK ...">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NIK</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nik" placeholder="Masukan NIK ...">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="nama" placeholder="Masukan Nama Lengkap ...">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">JENIS KELAMIN</label>
                <div class="col-sm-5">
                    <input name="jk" class="minimal" type="radio" value="Laki-laki" checked> Laki-laki &nbsp;&nbsp;
                    <input name="jk" class="minimal" type="radio" value="Perempuan"> Perempuan
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
                <div class="col-sm-5">
                    <textarea rowspan="2" class="form-control" name="tempat_lhr" placeholder="Tempat Lahir"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_lhr" placeholder="Masukan tanggal lahir">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
                <div class="col-sm-5">
                    <input name="kewarganegaraan" class="minimal" type="radio" value="wni" checked> WNI &nbsp;&nbsp;
                    <input name="kewarganegaraan" class="minimal" type="radio" value="wna"> WNA
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">AGAMA</label>
                <div class="col-sm-5">
                    <select class="form-control" name="agama">
                        <option value="" selected="selected">Pilih Agama</option>
                        <?php
                        $agamas=_fetchMultipleFromSql("SELECT * from agama order by urutan");
                        foreach ($agamas as $agama) {
                            ?>
                            <option value="<?=$agama['id_agama'];?>"><?=$agama['nama_agama'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">PENDIDIKAN</label>
                <div class="col-sm-5">
                    <select class="form-control" name="pendidikan">
                        <option value="" selected="selected">Pilih Pendidikan</option>
                        <?php
                        $pendidikans=_fetchMultipleFromSql("SELECT * from pendidikan order by urutan");
                        foreach ($pendidikans as $pendidikan) {
                            ?>
                            <option value="<?=$pendidikan['id_pendidikan'];?>"><?=$pendidikan['nama_pendidikan'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">PEKERJAAN</label>
                <div class="col-sm-5">
                    <select class="form-control" name="pekerjaan">
                        <option value="" selected="selected">Pilih Pekerjaan</option>
                        <?php
                        $pekerjaans=_fetchMultipleFromSql("SELECT * from pekerjaan order by urutan");
                        foreach ($pekerjaans as $pekerjaan) {
                            ?>
                            <option value="<?=$pekerjaan['id_pekerjaan'];?>"><?=$pekerjaan['nama_pekerjaan'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">STATUS PERNIKAHAN</label>
                <div class="col-sm-5">
                    <select class="form-control" name="status_nikah">
                        <option>Pilih Status Pernikahan</option>
                        <option>Kawin</option>
                        <option>Belum Kawin</option>
                        <option>Cerai Hidup</option>
                        <option>Cerai Mati</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">STATUS KELUARGA</label>
                <div class="col-sm-5">
                    <select class="form-control" name="status_keluarga">
                        <option>Pilih Status Keluarga</option>
                        <option>Kepala Keluarga</option>
                        <option>Istri</option>
                        <option>Anak</option>
                        <option>Cucu</option>
                        <option>Famili Lain</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">GOLONGAN DARAH</label>
                <div class="col-sm-5">
                    <select class="form-control" name="gol_dar">
                        <option>Pilih Golongan Darah</option>
                        <option>O</option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA AYAH</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_ayah" placeholder="Nama Ayah">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">NAMA IBU</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">ALAMAT</label>
                <div class="col-sm-5">
                    <textarea rowspan="2" class="form-control" name="alamat"placeholder="Alamat"></textarea>
                </div>
            </div>

            <?php
            include BASE_DIR."/inc/desa_selector.php";
            load_scripts();
            ?>
            <div class="form-group">
                <label class="col-sm-4 control-label">PROVINSI</label>
                <div class="col-sm-5">
                    <select name="provinsi_id" id="provinsi_id" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id');">
                        <?php
                        $provinsis = get_provinsi();
                        echo optionLoop($provinsis);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KABUPATEN / KOTA</label>
                <div class="col-sm-5">
                    <select name="kabupaten_id" id="kabupaten_id" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id');">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">KECAMATAN</label>
                <div class="col-sm-5">
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control" onchange="changeKecamatan(event, this, '#desa_id');">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">DESA</label>
                <div class="col-sm-5">
                    <select name="desa_id" id="desa_id" class="form-control"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">RT</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="rt" placeholder="RT">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">RW</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="rw" placeholder="RW">
                </div>
            </div>
        </div></div>







    <!----- ------------------------- FORM DATA KELAHIRAN ------------------------- ----->

    <div class="box-body">
    <div class="box box-solid box-primary">
        <div class="box-header">
            <h3 class="btn btn disabled box-title">
                <i class="fa fa-book"></i> Tambah Data Kelahiran </h3>
            <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i></a>
        </div>
        <div class="box-body">
            <form class="form-horizontal" action="<?php echo $aksi?>?module=kelahiran&aksi=tambah" role="form" method="post">
                <?php
                $sql6 ="SELECT max(id_kelahiran) as terakhir from kelahiran";
                $hasil6 = _query($sql6);
                $data6 = _fetch_array($hasil6);
                $lastID6 = $data6['terakhir'];
                $lastNoUrut6 = substr($lastID6, 3, 9);
                $nextNoUrut6 = $lastNoUrut6 + 1;
                $nextID6 = "IDL".sprintf("%03s",$nextNoUrut6);
                $id_kelahiran=$nextID6;
                ?>

                <div class="form-group">
                    <label class="col-sm-4 control-label">ID KELAHIRAN</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  readonly name="id_kelahiran" value="<?php echo $nextID6;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">TEMPAT DILAHIRKAN</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="tempat_dilahirkan">
                            <option>Pilih Tempat</option>
                            <option>RS/RSB</option>
                            <option>PUSKESMAS</option>
                            <option>POLINDES</option>
                            <option>RUMAH</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">PUKUL LAHIR</label>
                    <div class="col-sm-5">
                        <input type="time" class="form-control"  value="<?php echo date("hh-mm-ss"); ?>" name="pukul_lahir" placeholder="Pukul Lahir">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">JENIS KELAHIRAN</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="jenis_kelahiran">
                            <option>Pilih Jenis Kelahiran</option>
                            <option>Tunggal</option>
                            <option>Kembar 2</option>
                            <option>Kembar 3</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">KELAHIRAN KE</label>
                    <div class="col-sm-5">
                        <textarea rowspan="2" class="form-control" name="kelahiran_ke"placeholder="Kelahiran ke"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">PENOLONG KELAHIRAN</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="penolong">
                            <option>Pilih Penolong</option>
                            <option>Dokter</option>
                            <option>Bidan</option>
                            <option>Dukun Beranak</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">NAMA PENOLONG</label>
                    <div class="col-sm-5">
                        <textarea rowspan="2" class="form-control" name="nama_penolong"placeholder="Nama Penolong"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">BERAT BAYI</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control" name="berat_bayi">
                            <span class="input-group-addon">Kg</span>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">PANJANG BAYI</label>
                    <div class="col-sm-5">

                        <div class="input-group">
                            <input type="text" class="form-control" name="panjang_bayi">
                            <span class="input-group-addon">Cm</span>
                        </div>

                    </div> </div>
        </div>
    </div>

    <!----- ------------------------- FORM DATA PENDATANG ------------------------- ----->
    <div class="box-body">
    <div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="btn btn disabled box-title">
            <i class="fa fa-book"></i> Tambah Data Pendatang </h3>
        <a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
            <i class="fa fa-minus"></i></a>
    </div>
    <div class="box-body">
    <form class="form-horizontal" action="<?php echo $aksi?>?module=pendatang&aksi=tambah" role="form" method="post">
        <?php
        $sql9 ="SELECT max(id_pendatang) as terakhir from pendatang";
        $hasil9 = _query($sql9);
        $data9 = _fetch_array($hasil9);
        $lastID9 = $data9['terakhir'];
        $lastNoUrut9 = substr($lastID9, 3, 9);
        $nextNoUrut9 = $lastNoUrut9 + 1;
        $nextID9 = "IDP".sprintf("%03s",$nextNoUrut9);
        ?>
        <div class="form-group">
            <label class="col-sm-4 control-label">ID pendatang</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" required="required" readonly name="id_pendatang" value="<?php echo $nextID9;?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">TGL DATANG</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tanggal_datang" placeholder="tanggal datang ...">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">ALAMAT ASAL</label>
            <div class="col-sm-5">
                <input type="text" class="form-control"  name="alamat_asal" placeholder="Masukan Alamat Asal ...">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-4 control-label">  </label>
            <div class="col-sm-5">
                <hr/>
                <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                <button type="reset" class="btn btn-danger"><i class="glyphicon glyphicon-floppy-disk"></i><i>Reset</i></button>
            </div>
        </div>
    </form>
    <!----- ------------------------- END TAMBAH DATA User ------------------------- ----->