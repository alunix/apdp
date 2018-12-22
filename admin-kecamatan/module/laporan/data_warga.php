<?php
include "head.php";
?>
<section class="content-header">
    <h1>
        Laporan
        <small>Data Warga Kecamatan Tawang Kota Tasikmalaya</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
        <li class="active">Data Warga Kecamatan Tawang Kota Tasikmalaya</li>
    </ol>
</section>


<section class="content">
    <div class="text-center">
        <h3><img src="inc/tasik.png"/></h3>
        <b>Jl. Siliwangi No.72 <br/>
            Tasikmalaya, Jawa Barat, Indonesia</b>
    </div><br/>
    <h3 class="box-title text-center">DATA WARGA</h3>
    <div class="box box-default">

        <?php
        // Tampilkan data dari Database
        $sql2 = "SELECT dw.*, p.nama_pendidikan, pk.nama_pekerjaan, a.nama_agama FROM data_warga dw 
  left join pendidikan p on p.id_pendidikan=dw.pendidikan  
  left join pekerjaan pk on pk.id_pekerjaan=dw.pekerjaan  
  left join agama a on a.id_agama=dw.agama  
  where dw.id='$_GET[id]'";
        $no=1;
        $tampil = _query($sql2);
        while ($edit = _fetch_array($tampil)) {
        $Kode = $edit['id'];
        ?>

        <div class="box box-solid ">
            <div class="box-body">

                <div class="form-group  row row">
                    <label class="col-sm-2 control-label">NO</label>
                    <div class="col-sm-10">
                        <?php echo $edit['id']; ?>
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 control-label">NO. KK</label>
                    <div class="col-sm-10">
                        <?php echo $edit['no_kk']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nik']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">NAMA</label>
                    <div class="col-sm-10">
                        <?php echo strtoupper($edit['nama']); ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">JENIS KELAMIN</label>
                    <div class="col-sm-10">
                        <?php echo $edit['jk']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">TEMPAT LAHIR</label>
                    <div class="col-sm-10">
                        <?php echo $edit['tempat_lhr']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">TANGGAL LAHIR</label>
                    <div class="col-sm-10">
                        <?php echo $edit['tanggal_lhr']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">KEWARGANEGARAAN</label>
                    <div class="col-sm-10">
                        <?php echo $edit['kewarganegaraan']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">AGAMA</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nama_agama']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">PENDIDIKAN</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nama_pendidikan']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">PEKERJAAN</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nama_pekerjaan']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">STATUS PERNIKAHAN</label>
                    <div class="col-sm-10">
                        <?php echo $edit['status_nikah']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">STATUS KELUARGA</label>
                    <div class="col-sm-10">
                        <?php echo $edit['status_keluarga']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">Golongan Darah</label>
                    <div class="col-sm-10">
                        <?php echo $edit['gol_dar']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">NAMA AYAH</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nama_ayah']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">NAMA IBU</label>
                    <div class="col-sm-10">
                        <?php echo $edit['nama_ibu']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">ALAMAT</label>
                    <div class="col-sm-10">
                        <?php echo $edit['alamat']; ?>
                    </div>
                </div>

                <?php
                include BASE_DIR."/inc/desa_selector.php";
                load_scripts();
                ?>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">PROVINSI</label>
                    <div class="col-sm-10">
                        <?php
                        echo @get_detail_provinsi(substr($edit['desa_id'], 0, 2))['name'];
                        ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">KABUPATEN</label>
                    <div class="col-sm-10">
                        <?php
                        echo @get_detail_kabupaten(substr($edit['desa_id'], 0, 4))['name'];
                        ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">KECAMATAN</label>
                    <div class="col-sm-10">
                        <?php
                        echo @get_detail_kecamatan(substr($edit['desa_id'], 0, 7))['name'];
                        ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">DESA</label>
                    <div class="col-sm-10">
                        <?php
                        echo @get_detail_desa($edit['desa_id'])['name'];
                        ?>
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-sm-2 control-label">RT</label>
                    <div class="col-sm-10">
                        <?php echo $edit['rt']; ?>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-sm-2 control-label">RW</label>
                    <div class="col-sm-10">
                        <?php echo $edit['rw']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>
    <?php
    }
    ?>

    <?php
    include "tail.php";
    ?>
