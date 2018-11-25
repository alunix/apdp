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
             
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title center">Daftar siswa</h3>
				<span class="pull-right">
				Tasikmalaya, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
             
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

	<div class="box box-solid box-success">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Lihat Informasi Data Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 
    <div class="form-group">
    <label class="col-sm-4 control-label">NO</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id" value="<?php echo $edit['id']; ?>" >
    </div>
  </div> 
    <div class="form-group">
    <label class="col-sm-4 control-label">NO. KK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['no_kk']; ?>" readonly name="no_kk" placeholder="Masukan No KK ...">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nik']; ?>" readonly name="nik" placeholder="Masukan NIK ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama']; ?>" readonly name="nama" placeholder="Masukan Nama Lengkap">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['jk']; ?>" readonly name="nama" placeholder="Jenis Kelamin">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['tempat_lhr']; ?>" readonly name="tempat_lhr" placeholder="Tempat Lahir">
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_lhr']; ?>" placeholder="Masukan tanggal lahir" readonly name="tanggal_lhr">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">KEWARGANEGARAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['kewarganegaraan']; ?>" placeholder="kewarganegaraan" readonly name="kewarganegaraan">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">AGAMA</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['nama_agama']; ?>" placeholder="Agama" readonly name="agama">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PENDIDIKAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['nama_pendidikan']; ?>" placeholder="Pendidikan" readonly name="pendidikan">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PEKERJAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['nama_pekerjaan']; ?>" placeholder="Pekerjaan" readonly name="pekerjaan">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">STATUS PERNIKAHAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['status_nikah']; ?>" placeholder="Status Nikah" readonly name="status_nikah">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">STATUS KELUARGA</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['status_keluarga']; ?>" placeholder="Status Keluarga" readonly name="status_keluarga">
	</div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">Golongan Darah</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['gol_dar']; ?>" placeholder="Golongan Darah" readonly name="gol_dar">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA AYAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ayah']; ?>" readonly name="nama_ayah" placeholder="Nama Ayah">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA IBU</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['nama_ibu']; ?>" readonly name="nama_ibu" placeholder="Nama Ibu">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input rowspan="2" class="form-control" value="<?php echo $edit['alamat']; ?>" readonly name="alamat" placeholder="Alamat">
    </div>
  </div>

        <?php
        include BASE_DIR."/inc/desa_selector.php";
        load_scripts();
        ?>
        <div class="form-group">
            <label class="col-sm-4 control-label">PROVINSI</label>
            <div class="col-sm-5">
                <select name="provinsi_id" id="provinsi_id" class="form-control" onchange="changeProvinsi(event, this, '#kabupaten_id');" readonly="readonly" disabled="disabled">
                    <?php
                    $provinsis = get_provinsi();
                    echo optionLoop($provinsis, substr($edit['desa_id'], 0, 2));
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">KABUPATEN</label>
            <div class="col-sm-5">
                <select name="kabupaten_id" id="kabupaten_id" class="form-control" onchange="changeKabupaten(event, this, '#kecamatan_id');" readonly="readonly" disabled="disabled">
                    <?php
                    $kabupatens = get_kabupaten(substr($edit['desa_id'], 0, 2));
                    echo optionLoop($kabupatens, substr($edit['desa_id'], 0, 4));
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">KECAMATAN</label>
            <div class="col-sm-5">
                <select name="kecamatan_id" id="kecamatan_id" class="form-control" onchange="changeKecamatan(event, this, '#desa_id');" readonly="readonly" disabled="disabled">
                    <?php
                    $kecamatans = get_kecamatan(substr($edit['desa_id'], 0, 4));
                    echo optionLoop($kecamatans, substr($edit['desa_id'], 0, 7));
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">DESA</label>
            <div class="col-sm-5">
                <select name="desa_id" id="desa_id" class="form-control" readonly="readonly" disabled="disabled">
                    <?php
                    $desas = get_desa(substr($edit['desa_id'], 0, 7));
                    echo optionLoop($desas, $edit['desa_id']);
                    ?>
                </select>
            </div>
        </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rt']; ?>" readonly name="rt" placeholder="RT">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['rw']; ?>" readonly name="rw" placeholder="RW">
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
