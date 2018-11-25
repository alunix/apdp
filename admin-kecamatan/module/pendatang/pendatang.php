<?php
$aksi="module/pendatang/pendatang_aksi.php";


switch($_GET[aksi]){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA PENDATANG ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-success alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data pendatang"!!!
</p>
</div> 		
<div class="text-center">
<h3>Data Warga Pendatang</h3><hr/></div>
<form class="form-horizontal" action="module/laporan/cetak_pendatang.php" method="post">             
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
<button type="submit"name="submit" onclick="this.form.target='_blank';return true;" class="btn btn-success"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-success">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Pendatang </h3>
		<a class="btn btn-default pull-right" href="?module=pendatang&aksi=tambah">
		<i class="fa  fa-plus"></i> Tambah Data Pendatang </a>	
		</div>		
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-1">NIK</th>
		<th class="col-sm-1">NO.KK</th> 
		<th class="col-sm-2">NAMA</th>
		<th class="col-sm-1">TANGGAL DATANG</th> 	
		<th class="col-sm-1">ALAMAT ASAL</th> 			
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM pendatang ";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['tanggal_datang']; ?></td>
	<td><?php echo $k['alamat_asal']; ?></td>
	
	<td align="center">
	<a class="btn btn-xs btn-success"data-toggle="tooltip" title="Lihat Data Pendatang <?php echo $k['id_pendatang'];?>" href="?module=pendatang&aksi=detail_pendatang&id_pendatang=<?php echo $k['id_pendatang'];?>"><i class="glyphicon glyphicon-eye-open"></i></a>
	<a  class="btn btn-xs btn-info" href="?module=pendatang&aksi=edit&id_pendatang=<?php echo $k['id_pendatang'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" href="<?php echo $aksi ?>?module=pendatang&aksi=hapus&id_pendatang=<?php echo $k['id_pendatang'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->

<!----- ------------------------- END MENAMPILKAN DATA MASTER kematian ------------------------- ----->


<!----- ------------------------- TAMBAH DATA Pendatang ------------------------- ----->
<?php 
break;
 case "tambah": 
//ID
$sql ="SELECT max(id_pendatang) as terakhir from pendatang";
  $hasil = _query($sql);
  $data = _fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "ID".sprintf("%03s",$nextNoUrut);
?>
<h3 class="box-title margin text-center">Tambah Data Pendatang</h3>
<hr/>
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

     
  <div class="form-group">
    <label class="col-sm-4 control-label">ID pendatang</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id_pendatang" value="<?php echo $nextID;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nik" placeholder="Masukan NIK...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NO KK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="no_kk" placeholder="Masukan No kk ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nama" placeholder="Masukan Nama Lengkap ...">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TGL DATANG</label>
    <div class="col-sm-5">
      <input type="date" class="form-control" required="required" name="tanggal_datang" placeholder="tanggal datang ...">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT ASAL</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="alamat_asal" placeholder="Masukan Alamat Asal ...">
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
<!----- ------------------------- END TAMBAH DATA Pendatang ------------------------- ----->
<?php	
break;
case "edit" :

$data=_query("SELECT * FROM pendatang WHERE id_pendatang='$_GET[id_pendatang]'");
$edit=_fetch_array($data);

?>
<!----- ------------------------- EDIT DATA Pendatang ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Pendatang "<?php echo $_GET['id_pendatang']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=pendatang&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID pendatang</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="id_pendatang" value="<?php echo $edit['id_pendatang'];?>">	  
    </div>
	</div>
	
	<div class="form-group">
	<label class="col-sm-4 control-label">NIK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nik'];?>" name="nik">
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">NO KK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['no_kk'];?>" name="no_kk">
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">NAMA</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nama'];?>" name="nama">
	</div>
	</div>
      <div class="form-group">
	<label class="col-sm-4 control-label">TANGGAL DATANG</label>
	<div class="col-sm-3">
      <input type="date" class="form-control" value="<?php echo $edit['tanggal_datang']; ?>" name="tanggal_datang">
	</div>
	</div>
	
<div class="form-group">
     <label class="col-sm-4 control-label">ALAMAT ASAL</label>
	 <div class="col-sm-4">
           <input type="text" class="form-control" required="required" value="<?php echo $edit['alamat_asal'];?>" name="alamat_asal">
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
<!----- ------------------------- END EDIT DATA PENDATANG ------------------------- ----->
<?php	
break;
case "detail_pendatang" :
$data=_query("SELECT * FROM pendatang WHERE id_pendatang='$_GET[id_pendatang]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- LIHAT DATA PENDATANG ------------------------- ----->
<h3 class="box-title margin text-center">Lihat Data Pendatang "<?php echo $_GET['id_pendatang']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=pendatang&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Lihat Informasi Data Pendatang </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID pendatang</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_pendatang" value="<?php echo $edit['id_pendatang'];?>">	  
    </div>
	</div>
	
	<div class="form-group">
	<label class="col-sm-4 control-label">NIK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nik'];?>" readonly name="nik">
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">NO KK</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['no_kk'];?>" readonly name="no_kk">
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-4 control-label">NAMA</label>
	<div class="col-sm-3">
      <input type="text" class="form-control" required="required" value="<?php echo $edit['nama'];?>" readonly name="nama">
	</div>
	</div>
      <div class="form-group">
	<label class="col-sm-4 control-label">TANGGAL DATANG</label>
	<div class="col-sm-3">
      <input type="date" class="form-control" value="<?php echo $edit['tanggal_datang']; ?>" readonly name="tanggal_datang">
	</div>
	</div>
<div class="form-group">
     <label class="col-sm-4 control-label">ALAMAT ASAL</label>
	 <div class="col-sm-4">
           <input type="text" class="form-control" required="required" value="<?php echo $edit['alamat_asal'];?>" readonly name="alamat_asal">
	</div>
  </div>

<?php
break;
}
?>
