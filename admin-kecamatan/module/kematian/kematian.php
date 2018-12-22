<?php
$aksi="module/kematian/kematian_aksi.php";


switch(@$_GET['aksi']){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER kematian ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-info alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data Kematian Warga"!!!
</p>
</div> 		
<div class="text-center">
<h3>Data Kematian Warga</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_kematian.php" method="post">             
  <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
	<i class="fa fa-calendar"></i>
  </div>
  <input type="text" name="tanggal" required="required" class="form-control pull-right" id="reservation"/>
</div><!-- /.input group -->
</div>
<div class="col-sm-1">
<button type="submit"name="submit" onclick="this.form.target='_self';return true;" class="btn btn-info"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-info">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Kematian Warga </h3>
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-1">NO. KK</th>
		<th class="col-sm-1">NIK</th> 
		<th class="col-sm-2">NAMA</th>
		<th class="col-sm-1">TANGGAL WAFAT</th>
		<th class="col-sm-1">PUKUL WAFAT</th> 
		<th class="col-sm-2">SEBAB KEMATIAN</th>
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$desaId = buildQueryDesaId(NULL, "a");
$sql = "SELECT * FROM data_warga a, kematian b where a.id=b.id and $desaId";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['tanggal_wafat']; ?></td>
	<td><?php echo $k['pukul_wafat']; ?></td>
	<td><?php echo $k['sebab_kematian']; ?></td>

	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA KEMATIAN ------------------------- ----->
<?php 
break;
case "list_kematian":
?>
<h3 class="box-title margin text-center">Data Kematian Warga</h3>
<hr/>

	<div class="box box-solid box-info">
		<div class="box-header">
		    <h3 class="btn btn disabled box-title">
		        <i class="fa fa-book"></i>
		        Data Kematian Warga
            </h3>
            <div class="pull-right">
                <a href="<?=moduleUrlByLevel('kematian');?>" class="btn btn-default btn-md"> <i class="fa fa-close"></i> Batal </a>
            </div>
		</div>			
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-green">
	<th class="col-sm-1">NO</th>
		<th class="col-sm-2">NO. KK</th>
		<th class="col-sm-1">NIK</th> 
		<th class="col-sm-1">NAMA</th> 
		<th class="col-sm-2">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php
// Tampilkan data dari Database
$desaId = buildQueryDesaId(NULL, "dw");
$sql = "SELECT dw.* FROM data_warga dw left join kematian k on k.id=dw.id where $desaId and k.id IS NULL ";
$tampil = _query($sql);
$no=1;
while ($data = _fetch_array($tampil)) { 
$Kode = $data['id'];?>

	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['no_kk']; ?></td>
	<td><?php echo $data['nik']; ?></td>
	<td><?php echo $data['nama']; ?></td>
	<td align="center">
	<a class="btn btn-xs btn-success" href="?module=kematian&aksi=tambah&id=<?php echo $data['id'];?>"    onclick="return confirm('Pilih kematian? <?php echo $data['id']; ?>?')"> <i class="fa fa-book"></i> Pilih?</a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
<!----- ------------------------- END LIST DATA KEMATIAN ------------------------- ----->
<?php 
break;
case "tambah": 
?>
<!----- ------------------------- TAMBAH DATA MASTER kematian ------------------------- ----->
<?php
$sql6 ="SELECT max(id_kematian) as terakhir from kematian";
  $hasil6 = _query($sql6);
  $data6 = _fetch_array($hasil6);
  $lastID6 = $data6['terakhir'];
  $lastNoUrut6 = substr($lastID6, 3, 9);
  $nextNoUrut6 = $lastNoUrut6 + 1;
  $nextID6 = "IDK".sprintf("%03s",$nextNoUrut6);
  $id_kematian=$nextID6;
?>
<h3 class="box-title margin text-center">Tambah Data kematian Warga</h3>
<hr/>
	<div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah Data Kematian </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=kematian&aksi=tambah" role="form" method="post">        

     
  <div class="form-group">
    <label class="col-sm-4 control-label">ID KEMATIAN</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id_kematian" value="<?php echo $nextID6;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID WARGA</label>
    <div class="col-sm-5">
      <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'];?>" >
	  <input type="text" class="form-control" required="required" disabled value="<?php echo $_GET['id'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nama from data_warga where id='$_GET[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div> 

   <div class="form-group">
     <label class="col-sm-4 control-label">PUKUL WAFAT</label>
	 <div class="col-sm-5">
	 <input type="time" class="form-control" required="required" value="<?php echo date("hh-mm-ss"); ?>" name="pukul_wafat" placeholder="Pukul Wafat">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL WAFAT</label>
	 <div class="col-sm-5">
	 <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tanggal_wafat">
	</div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">SEBAB KEMATIAN</label>
    <div class="col-sm-3">	
    <select name="sebab_kematian" class="form-control"><option>-- Sebab Kematian --</option>
	<option name="sebab_kematian" value="Kecelakaan"> Kecelakaan </option>
	<option name="sebab_kematian" value="Sakit"> Sakit </option>
	<option name="sebab_kematian" value="Lainnya"> Lainnya </option>
	</select>
    </div>
  </div>
   
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
      <button type="submit"name="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> SIMPAN</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> RESET</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> KEMBALI</a>			 
    </div>
  </div> 
</form>
</div> 
</div> 
</div> 
</form>
</div> </div> 
<!----- ------------------------- END TAMBAH DATA KEMATIAN ------------------------- ----->
<?php	
break;
case "edit" :
$data=_query("SELECT * FROM kematian WHERE id_kematian='$_GET[id_kematian]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA KEMATIAN ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data kematian "<?php echo $_GET['id_kematian']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=kematian&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data kematian </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">No. kematian / Tanggal</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="id_kematian" value="<?php echo $edit['id_kematian'];?>">	  
    </div>
	<div class="col-sm-2">
	  <div class="input-group">
	<div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" value="<?php echo $edit['tanggal_wafat'];?>" name="tanggal_wafat">
	</div><!-- /.input group -->
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama kematian</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nama from data_warga where id='$edit[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div>
<div class="form-group">
     <label class="col-sm-4 control-label">PUKUL WAFAT</label>
	 <div class="col-sm-5">
 <input type="time" class="form-control" required="required" value="<?php echo $edit['pukul_wafat'];?>" name="pukul_wafat">
	</div>
  </div>  
  
  <div class="form-group">
    <label class="col-sm-4 control-label">Sebab Kematian</label>
    <div class="col-sm-3">	
    <select name="sebab_kematian" class="form-control"><option> Pilih Sebab Kematian</option>
	<option name="sebab_kematian" value="Sakit" <?php if(($edit['sebab_kematian'])== "Sakit")
				{echo "selected=\"selected\"";};?>> Sakit </option>
	<option name="sebab_kematian" value="Kecelakaan" <?php if(($edit['sebab_kematian'])== "Kecelakaan")
				{echo "selected=\"selected\"";};?>> Kecelakaan </option>
	<option name="sebab_kematian" value="Lainnya" <?php if(($edit['sebab_kematian'])== "Lainnya")
				{echo "selected=\"selected\"";};?>> Lainnya</option>
	</select>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a class="btn btn-warning" href="?module=kematian"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
 
    </div>
  </div>   
</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER KEMATIAN ------------------------- ----->
<?php	
break;
case "detail_kematian" :
    $desaId = buildQueryDesaId(NULL, "a");
$data=_query("SELECT * FROM data_warga a, kematian b where a.id=b.id and $desaId");
$edit=_fetch_array($data);
?>
<!----- ------------------------- LIHAT DATA KEMATIAN WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Lihat Data Warga "<?php echo $_GET['id']; ?>"</h3>
<br/>



<form class="form-horizontal" action="<?php echo $aksi?>?module=kematian&aksi=edit" role="form" method="post">             

<div class="box box-solid box-info">
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
     <label class="col-sm-4 control-label">TANGGAL WAFAT</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_wafat']; ?>" placeholder="Masukan tanggal wafat" readonly name="tanggal_wafat">
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
    <input type="text" class="form-control" value="<?php echo $edit['agama']; ?>" placeholder="Agama" readonly name="agama">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PENDIDIKAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['pendidikan']; ?>" placeholder="Pendidikan" readonly name="pendidikan">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PEKERJAAN</label>
	 <div class="col-sm-5">
    <input type="text" class="form-control" value="<?php echo $edit['pekerjaan']; ?>" placeholder="Pekerjaan" readonly name="pekerjaan">
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
  <div class="form-group">
    <label class="col-sm-4 control-label">DESA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['desa']; ?>" readonly name="desa" placeholder="Desa">
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
break;
}
?>
