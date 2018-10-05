<?php
$aksi="module/kematian/kematian_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA MASTER kematian ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-danger alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman kematian"!!!
</p>
</div>


<div class="text-center">
<h3>Data Master Prestasi</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_prestasi.php" method="post">             
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
<button type="submit"name="submit" onclick="this.form.target='_blank';return true;" class="btn btn-danger"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Prestasi Pegawai </h3>
		<a class="btn btn-default pull-right" href="?module=kematian&aksi=list_kematian">
		<i class="fa  fa-plus"></i> Tambah </a>	
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-2">NO. KK</th>
		<th class="col-sm-2">NIK</th> 
		<th class="col-sm-2">NAMA</th>
		<th class="col-sm-2">STATUS HIDUP</th> 		
		<th class="col-sm-2">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM data_warga a, kematian b where a.id=b.id ";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['status_hidup']; ?></td>
	
	<td align="center">
	<a  class="btn btn-xs btn-info" href="?module=kematian&aksi=edit&id_kematian=<?php echo $k['id_kematian'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" href="<?php echo $aksi ?>?module=kematian&aksi=hapus&id_kematian=<?php echo $k['id_kematian'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->


<?php 
break;
case "list_kematian": 
?>

<h3 class="box-title margin text-center">Data kematianan</h3>
<hr/>

	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa fa-book"></i>
		Data Pekematianan  </h3>
		<a class="btn btn-default pull-right"href="?module=warga&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah data Warga</a>		
		</div>			
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-green">
	<th class="col-sm-1">no</th>
		<th class="col-sm-2">no kk</th>
		<th class="col-sm-1">nik</th> 
		<th class="col-sm-1">nama</th> 
		<th class="col-sm-2">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "select * from data_warga ";
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
<?php 
break;
case "tambah": 
?>
<!----- ------------------------- TAMBAH DATA MASTER kematian ------------------------- ----->
<?php
$hasil = _query("SELECT max(id_kematian) as terakhir from kematian"); $data = _fetch_array($hasil);
  $lastID = $data['terakhir']; $lastNoUrut = substr($lastID,13, 20); $nextNoUrut = $lastNoUrut + 1;
  $nextID = "PRS/BZ/".date('m/y')."/".sprintf("%04s",$nextNoUrut);
?>
<h3 class="box-title margin text-center">Tambah Data kematian Baru</h3>
<hr/>
	<div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah kematian </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=kematian&aksi=tambah" role="form" method="post">        

     
  <div class="form-group">
    <label class="col-sm-4 control-label">id</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id_kematian" value="<?php echo $nextID;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ID</label>
    <div class="col-sm-5">
      <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id'];?>" >
	  <input type="text" class="form-control" required="required" disabled value="<?php echo $_GET['id'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Warga</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nama from data_warga where id='$_GET[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div> 
  
  
  <div class="form-group">
    <label class="col-sm-4 control-label">Status</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="status" placeholder="status">
    </div>
  </div>  
  <div class="form-group">
    <label class="col-sm-4 control-label">Status Hidup</label>
    <div class="col-sm-3">	
    <select name="status_hidup" class="form-control"><option>-- Pilih Status Hidup --</option>
	<option name="status_hidup" value="Hidup"> Hidup </option>
	<option name="status_hidup" value="Mati"> Mati </option>
	</select>
    </div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">PUKUL WAFAT</label>
	 <div class="col-sm-5">
	 <input type="time" class="form-control" required="required" name="pukul_wafat" placeholder="Pukul Wafat">
	</div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL WAFAT</label>
	 <div class="col-sm-5">
	 <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tanggal_wafat">
	</div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Sebab Kematian</label>
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
      <button type="submit"name="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> PROSES</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>			 
    </div>
  </div> 
</form>
</div> 
</div> 
</div> 
</form>
</div> </div> 


<!----- ------------------------- END TAMBAH DATA MASTER kematian ------------------------- ----->
<?php	
break;
case "edit" :

$data=_query("select * from kematian where id_kematian='$_GET[id_kematian]'");
$edit=_fetch_array($data);

?>
<!----- ------------------------- EDIT DATA KEMATIAN ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data kematian "<?php echo $_GET['id_kematian']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=kematian&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Data Kematian </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
	<div class="form-group">
    <label class="col-sm-4 control-label">Nama Warga</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nama from data_warga where id='$edit[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal Wafat</label>
    <div class="col-sm-5">
	  <input type="date" class="form-control" name="tanggal_wafat" value="<?php echo $edit['tanggal_wafat'];?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Pukul Wafat</label>
    <div class="col-sm-5">
	  <input type="time" class="form-control" name="pukul_wafat" value="<?php echo $edit['pukul_wafat'];?>" >
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
<a href="?module=cancel">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Cancel</button></a>	
 
    </div>
  </div>   
</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER kematian ------------------------- ----->
<?php
break;
}
?>
