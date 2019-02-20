<?php
$aksi="module/warga/warga_aksi.php";


switch(@$_GET['aksi']){
default:
    include 'default.php';
    break;
case "tambah":
    include "tambah.php";
    break;
case "edit" :
    include "edit.php";
    break;
case "export" :
    ob_end_clean();
    include "export.php";
    exit();
    break;
case "import" :
    include "import.php";
    break;
case "delete_import_file" :
    include "delete_import_file.php";
    break;
case "proses_import_file" :
    include "proses_import_file.php";
    break;
case "delete_import_result" :
    include "delete_import_result.php";
    break;
case "detail_warga" :
?>
<center>
<h3> Data Warga</h3>
</center>

<form class="form-horizontal" action="<?php echo $aksi?>?module=warga&aksi=edit" role="form" method="post">             
<div class="nav-tabs-custom">
<div class="pull-right">
    <ul class="nav nav-tabs">
        <li><a class="btn btn-default btn-sm pull-right" href="<?=moduleUrlByLevel('warga');?>" ><i class="fa fa-history"></i>  Kembali</a></li>
    </ul>
</div>
<ul class="nav nav-tabs">
	<li class="active"><a class="text-red" href="#data" data-toggle="tab"><i class="fa fa-user-md"></i> Data Warga </h3> </a></li>
	<li><a class="text-red" href="#data1" data-toggle="tab"><i class="fa fa-institution"></i> Data Kelahiran</h3></a></li>
	<li><a class="text-red" href="#data4" data-toggle="tab"><i class="fa fa-book"></i>  Data Pendatang</a></li>
</ul>
 <!-- <li><a href="javascript:history.back()" class="btn btn-sm btn-primary pull-right"><i class="fa fa-backward"></i> Kembali</a>	 </li> -->
<div class="tab-content">
<div class="tab-pane active" id="data">
<section id="new">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-user-md"></i> Informasi Data Warga </h3>
<div class="pull-right">
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	</div>	
	<div class="box-body">
<?php 
$data=_query("select * from data_warga where id='$_GET[id]' and ".buildQueryDesaId());
$edit=_fetch_array($data);
?>	
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
      <input type="text" class="form-control" value="<?php echo $edit['jk']; ?>" readonly name="jk" placeholder="Jenis Kelamin">
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
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_lhr']; ?>" readonly name="tanggal_lhr" placeholder="Masukan tanggal lahir">
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
    <input type="text" class="form-control" value="<?php echo @_fetchOneFromSql(sprintf("SELECT * FROM agama where id_agama='%s'", $edit['agama']))['nama_agama']; ?>" placeholder="Agama" readonly name="agama">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PENDIDIKAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo @_fetchOneFromSql(sprintf("SELECT * FROM pendidikan where id_pendidikan='%s'", $edit['pendidikan']))['nama_pendidikan']; ?>" placeholder="Pendidikan" readonly name="pendidikan">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PEKERJAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo @_fetchOneFromSql(sprintf("SELECT * FROM pekerjaan where id_pekerjaan='%s'", $edit['pekerjaan']))['nama_pekerjaan']; ?>" placeholder="Pekerjaan" readonly name="pekerjaan">
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
     <label class="col-sm-4 control-label">GOLONGAN DARAH</label>
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
            <label class="col-sm-4 control-label">KABUPATEN / KOTA</label>
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
	</div></div></section></div>
<div class="tab-pane" id="data1">
<section id="new1">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-institution"></i> Data Kelahiran </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
<?php $d=_query("select * from kelahiran where  id='$_GET[id]'");
$e=_fetch_array($d);
?>	
	
<div class="form-group">
    <label class="col-sm-4 control-label">ID Kelahiran</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['id_kelahiran']; ?>">
    </div></div> 	
<div class="form-group">
    <label class="col-sm-4 control-label">Tempat Dilahirkan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['tempat_dilahirkan']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Pukul Lahir </label>
    <div class="col-sm-5">
      <input type="time" class="form-control" disabled value="<?php echo $e['pukul_lahir']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Jenis Kelahiran </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['jenis_kelahiran']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Kelahiran Ke</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['kelahiran_ke']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Penolong </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['penolong']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Nama Penolong </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nama_penolong']; ?>">
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Berat Bayi </label>
    <div class="col-sm-5">
      <div class="input-group">
          <input type="text" class="form-control" disabled value="<?php echo $e['berat_bayi']; ?>">
          <span class="input-group-addon">Kg</span>
      </div>
    </div></div>
<div class="form-group">
    <label class="col-sm-4 control-label">Panjang Bayi </label>
    <div class="col-sm-5">
        <div class="input-group">
            <input type="text" class="form-control" disabled value="<?php echo $e['panjang_bayi']; ?>">
            <span class="input-group-addon">Cm</span>
        </div>

    </div></div>
</div></div></section></div>



<div class="tab-pane" id="data4">
<section id="new4">
<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i>
	</a></div>	
	<div class="box-body">
<?php $d=_query("select * from pendatang where id='$_GET[id]'");
$f=_fetch_array($d);
?>
<div class="form-group">
    <label class="col-sm-4 control-label">ID Pendatang</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $f['id_pendatang']; ?>">
    </div></div> 
<div class="form-group">
    <label class="col-sm-4 control-label">Tanggal Datang</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" disabled value="<?php echo $f['tanggal_datang']; ?>">
    </div></div>
	<div class="form-group">
    <label class="col-sm-4 control-label">Alamat Asal</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo @$f['alamat_asal']; ?>">
    </div></div>
	
</div></div></section></div>





<?php	
break;
}
?>
