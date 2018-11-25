<?php
$aksi="module/pindah/pindah_aksi.php";


switch(@$_GET['aksi']){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA PINDAH ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-success alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data Pindah"!!!
</p>
</div> 		
<div class="text-center">
<h3>Data Pindah Warga</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_pindah.php" method="post">             
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
<button type="submit"name="submit" onclick="this.form.target='_self';return true;" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Pindah Warga </h3>
		<a class="btn btn-default pull-right" href="?module=pindah&aksi=list_pindah">
		<i class="fa  fa-plus"></i> Tambah Data Pindah Warga </a>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-1">NO. KK</th>
		<th class="col-sm-1">NIK</th> 
		<th class="col-sm-2">NAMA</th>	
		<th class="col-sm-2">STATUS PINDAH</th>	
		<th class="col-sm-2">TANGGAL PINDAH</th>	
		<th class="col-sm-2">ALAMAT PINDAH</th>	
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM data_warga a, pindah b where a.id=b.id ";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['status_pindah']; ?></td>
	<td><?php echo $k['tanggal_pindah']; ?></td>
	<td><?php echo $k['alamat_pindah']; ?></td>
	<td align="center">
	
	<a  class="btn btn-xs btn-info" href="?module=pindah&aksi=edit&id_pindah=<?php echo $k['id_pindah'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" href="<?php echo $aksi ?>?module=pindah&aksi=hapus&id_pindah=<?php echo $k['id_pindah'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA PINDAH ------------------------- ----->
<?php 
break;
case "list_pindah": 
?>
<!----- ------------------------- LIST PINDAH WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Data Pindah Warga</h3>
<hr/>

	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa fa-book"></i>
		Data Pindah  </h3>		
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
	<a class="btn btn-xs btn-success" href="?module=pindah&aksi=tambah&id=<?php echo $data['id'];?>" onclick="return confirm('Pilih Data Pindah? <?php echo $data['id']; ?>?')"> <i class="fa fa-book"></i> Pilih?</a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
<!----- ------------------------- END LIST PINDAH WARGA ------------------------- ----->
<?php 
break;
case "tambah": 
?>
<!----- ------------------------- TAMBAH DATA PINDAH WARGA ------------------------- ----->
<?php
$sql6 ="SELECT max(id_pindah) as terakhir from pindah";
  $hasil6 = _query($sql6);
  $data6 = _fetch_array($hasil6);
  $lastID6 = $data6['terakhir'];
  $lastNoUrut6 = substr($lastID6, 3, 9);
  $nextNoUrut6 = $lastNoUrut6 + 1;
  $nextID6 = "IDP".sprintf("%03s",$nextNoUrut6);
  $id_pindah=$nextID6;
 ?>
<h3 class="box-title margin text-center">Tambah Data Pindah Warga</h3>
<hr/>
	<div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah Data Pindah Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=pindah&aksi=tambah" role="form" method="post">        

     
  <div class="form-group">
    <label class="col-sm-4 control-label">ID PINDAH</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" readonly name="id_pindah" value="<?php echo $nextID6;?>">
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
    <label class="col-sm-4 control-label">STATUS PINDAH</label>
    <div class="col-sm-3">	
    <select name="status_pindah" class="form-control"><option>-- Pilih Status Pindah --</option>
	<option name="status_pindah" value="Pindah"> Pindah </option>
	<option name="status_pindah" value="Tetap"> Tetap </option>
	</select>
    </div>
  </div>
   <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL PINDAH</label>
	 <div class="col-sm-5">
	 <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tanggal_pindah">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT ASAL</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select alamat from data_warga where id='$_GET[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['alamat'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT PINDAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="alamat_pindah" placeholder="Masukan Alamat Pindah ...">
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
<!----- ------------------------- END TAMBAH DATA PINDAH WARGA ------------------------- ----->
<?php	
break;
case "edit" :

$data=_query("SELECT * FROM pindah WHERE id_pindah='$_GET[id_pindah]'");
$edit=_fetch_array($data);

?>
<!----- ------------------------- EDIT DATA PINDAH WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Pindah Warga "<?php echo $_GET['id_pindah']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=pindah&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Pindah Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID PINDAH / TANGGAL PINDAH</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pindah" value="<?php echo $edit['id_pindah'];?>">	  
    </div>
	<div class="col-sm-2">
	  <div class="input-group">
	<div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" value="<?php echo $edit['tanggal_pindah'];?>" name="tanggal_pindah">
	</div><!-- /.input group -->
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("SELECT nama FROM data_warga WHERE id='$edit[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">STATUS PINDAH</label>
    <div class="col-sm-3">	
    <select name="status_pindah" class="form-control"><option> PILIH STATUS PINDAH</option>
	<option name="status_pindah" value="Pindah" <?php if(($edit['status_pindah'])== "Pindah")
				{echo "selected=\"selected\"";};?>> Pindah </option>
	<option name="status_pindah" value="Tetap" <?php if(($edit['status_pindah'])== "Tetap")
				{echo "selected=\"selected\"";};?>> Tetap </option>
	</select>
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL PINDAH</label>
	 <div class="col-sm-5">
    <input type="date" class="form-control" value="<?php echo $edit['tanggal_pindah']; ?>" name="tanggal_pindah" placeholder="Masukan tanggal pindah">
	</div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT PINDAH</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?php echo $edit['alamat_pindah']; ?>" name="alamat_pindah" placeholder="Masukan Alamat Pindah">
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> SIMPAN</button>
<a href="?module=cancel">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> BATAL</button></a>	
 
    </div>
  </div>   
</form>
</div>
</div>
<!----- ------------------------- END EDIT DATA MASTER kematian ------------------------- ----->
<?php	
break;
case "detail_pindah" :
$data=_query("SELECT * FROM pindah WHERE id_pindah='$_GET[id_pindah]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- LIHAT DATA PINDAH ------------------------- ----->
<h3 class="box-title margin text-center">Detail Pindah Warga "<?php echo $_GET['id_pindah']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=pindah&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Detail Informasi Data Pindah Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID PINDAH / TANGGAL PINDAH</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pindah" value="<?php echo $edit['id_pindah'];?>">	  
    </div>
	<div class="col-sm-2">
	  <div class="input-group">
	<div class="input-group-addon">
       <i class="fa fa-calendar"> </i>
    </div>
      <input type="date" class="form-control" required="required" value="<?php echo $edit['tanggal_pindah'];?>" readonly name="tanggal_pindah">
	</div><!-- /.input group -->
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("SELECT nama FROM data_warga WHERE id='$edit[id]'"));
	?>
      <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div>
<div class="form-group">
     <label class="col-sm-4 control-label">ALAMAT PINDAH</label>
	 <div class="col-sm-5">
 <input type="text" class="form-control" required="required" value="<?php echo $edit['alamat_pindah'];?>" readonly name="alamat_pindah">
	</div>
  </div>     
</form>
</div>
</div>
</div>
</form>

<?php
break;
}
?>
