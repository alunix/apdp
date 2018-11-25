<?php
$aksi="module/surat_keterangan/surat_keterangan_aksi.php";


switch(@$_GET['aksi']){
default:
?>
<!----- ------------------------- MENAMPILKAN DATA KETERANGAN WARGA ------------------------- ----->			
<div style="margin-right:10%;margin-left:15%" class="alert alert-info alert-dismissable">
<button type="button" class="btn btn-primary close" data-dismiss="alert" aria-hidden="true">&nbsp;<i class="fa fa-close "></i>&nbsp;</button>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i class="icon fa fa-info"></i>
"Anda Berada Di Halaman Data Keterangan"!!!
</p>
</div> 		
<div class="text-center">
<h3>Data Keterangan Warga</h3><hr/></div>
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
<button type="submit"name="submit" onclick="this.form.target='_self';return true;" class="btn btn-info"><i class="glyphicon glyphicon-print"></i>&nbsp; Cetak</button>
</div></div>  
</form>
	<div class="box box-solid box-info">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="glyphicon glyphicon-thumbs-up"></i>
		Data Ketarangan Warga </h3>
		<a class="btn btn-default pull-right" href="?module=surat_keterangan&aksi=list_keterangan">
		<i class="fa  fa-plus"></i> Tambah Data Ketarangan Warga </a>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>
		<th class="col-sm-1">NO SURAT</th>
		<th class="col-sm-1">NO. KK</th>
		<th class="col-sm-1">NIK</th> 
		<th class="col-sm-2">NAMA</th>	
		<th class="col-sm-2">TANGGAL</th>	
		<th class="col-sm-2">MASA BERLAKU</th>	
		<th class="col-sm-1">AKSI</th> 	
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM data_warga a, surat_keterangan b where a.id=b.id ";

$tampil = _query($sql);
$no=1;
while ($k = _fetch_array($tampil)) { 
$Kode = $k['id'];?>

	<tr>	
	<td><?php echo $no++; ?></td> 
	<td><?php echo $k['id_surat_keterangan']; ?></td>
	<td><?php echo $k['no_kk']; ?></td>
	<td><?php echo $k['nik']; ?></td>
	<td><?php echo $k['nama']; ?></td>
	<td><?php echo $k['tanggal']; ?></td>
	<td><?php echo $k['masa_berlaku']; ?></td>
	<td align="center">
	
	<a  class="btn btn-xs btn-info" href="?module=surat_keterangan&aksi=edit&id_surat_keterangan=<?php echo $k['id_surat_keterangan'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-warning" href="<?php echo $aksi ?>?module=surat_keterangan&aksi=hapus&id_surat_keterangan=<?php echo $k['id_surat_keterangan'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	<a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Cetak Data Ketarangan??"href="module/laporan/data_keterangan.php?module=laporan&aksi=edit&id=<?php echo $k['id'];?>" alt="Cetak Data"><i class="glyphicon glyphicon-print"></i></a>
		
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
<?php 
break;
case "list_keterangan": 
?>
<!----- ------------------------- LIST KETERANGAN WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Data Keterangan Warga</h3>
<hr/>

	<div class="box box-solid box-info">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa fa-book"></i>
		Data Keterangan Warga  </h3>		
		</div>			
	<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr class="text-aqua">
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
	<a class="btn btn-xs btn-info" href="?module=surat_keterangan&aksi=tambah&id=<?php echo $data['id'];?>" onclick="return confirm('Pilih Data Pindah? <?php echo $data['id']; ?>?')"> <i class="fa fa-book"></i> Pilih?</a>
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
<!----- ------------------------- TAMBAH DATA KETERANGAN WARGA ------------------------- ----->
<?php
  $hasil = _query("SELECT max(id_surat_keterangan) as terakhir from surat_keterangan"); $data = _fetch_array($hasil);
  $lastID = $data['terakhir']; $lastNoUrut = substr($lastID,13, 20); $nextNoUrut = $lastNoUrut + 1;
  $nextID = "23/KE/".date('m/y')."/".sprintf("%04s",$nextNoUrut);
?>
<h3 class="box-title margin text-center">Tambah Data Keterangan</h3>
<hr/>
	<div class="box-body">
	<div class="box box-solid box-primary">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-book"></i> Tambah Data Keterangan </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=surat_keterangan&aksi=tambah" role="form" method="post">        
  <div class="form-group">
    <label class="col-sm-4 control-label">ID KETERANGAN</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" required="required" name="id_surat_keterangan" value="<?php echo $nextID;?>">
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
     <label class="col-sm-4 control-label">TANGGAL </label>
	 <div class="col-sm-5">
	 <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tanggal">
	</div>
  </div>
  <?php 
// Tampilkan data dari Database
$a = _query("SELECT * FROM data_warga where id='$_GET[id]'");
while ($e = _fetch_array($a)) { ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nama'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['nik'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['tempat_lhr'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['tanggal_lhr'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['jk'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">AGAMA</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['agama'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">PEKERJAAN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['pekerjaan'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">STATUS</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['status_nikah'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['alamat'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['rt'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" disabled value="<?php echo $e['rw'];?>">
    </div>
  </div>
  <?php } ?>
   
  <div class="form-group">
    <label class="col-sm-4 control-label">PERNYATAAN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="pernyataan" placeholder="Masukan Pernyataan ...">
    </div>
  </div>  
<div class="form-group">
    <label class="col-sm-4 control-label">KEPERLUAN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="keperluan" placeholder="Masukan Keperluan ...">
    </div>
  </div>  
<div class="form-group">
    <label class="col-sm-4 control-label">KETERANGAN</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="keterangan" placeholder="Masukan Keterangan ...">
    </div>
  </div>  

  <div class="form-group">
    <label class="col-sm-4 control-label">MASA BERLAKU</label>
    <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
	<i class="fa fa-calendar"></i>
  </div>
  <input type="text" name="masa_berlaku" required="required" class="form-control pull-right" id="reservation"/>
</div><!-- /.input group -->
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
<!----- ------------------------- END TAMBAH DATA KETERANGAN WARGA ------------------------- ----->
<?php	
break;
case "edit" :
$data=_query("SELECT * FROM surat_keterangan WHERE id_surat_keterangan='$_GET[id_surat_keterangan]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- EDIT DATA KETERANGAN WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Edit Data Keterangan Warga "<?php echo $_GET['id_surat_keterangan']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=surat_keterangan&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Edit Informasi Data Keterangan Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID KETERANGAN</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="id_surat_keterangan" value="<?php echo $edit['id_surat_keterangan'];?>">	  
    </div>
	</div>
  </div><div class="form-group">
     <label class="col-sm-4 control-label">TANGGAL </label>
	 <div class="col-sm-5">
	 <input type="date" class="form-control" required="required" value="<?php echo date("Y-m-d"); ?>" name="tanggal">
	</div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NAMA</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nama from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['nama'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">NIK</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select nik from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['nik'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TEMPAT LAHIR</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select tempat_lhr from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['tempat_lhr'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">TANGGAL LAHIR</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select tanggal_lhr from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['tanggal_lhr'];?>">
    </div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">JENIS KELAMIN</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select jk from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['jk'];?>">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">AGAMA</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select agama from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['agama'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">PEKERJAAN</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select pekerjaan from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['pekerjaan'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">STATUS</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select status_nikah from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['status_nikah'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">ALAMAT</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select alamat from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['alamat'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RT</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select rt from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['rt'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">RW</label>
    <div class="col-sm-5">
	<?php 
	$s=_fetch_array(_query("select rw from data_warga where id='$edit[id]'"));
	?>
            <input type="text" class="form-control" disabled value="<?php echo $s['rw'];?>">
    </div>
  </div>
  <div class="form-group">
     <label class="col-sm-4 control-label">PERNYATAAN </label>
	 <div class="col-sm-5">
 <input type="text" class="form-control" required="required" value="<?php echo $edit['pernyataan'];?>" name="pernyataan">
	</div>
  </div> 
  <div class="form-group">
     <label class="col-sm-4 control-label">KEPERLUAN</label>
	 <div class="col-sm-5">
 <input type="text" class="form-control" required="required" value="<?php echo $edit['keperluan'];?>" name="keperluan">
	</div>
  </div> 
   <div class="form-group">
     <label class="col-sm-4 control-label">KETERANGAN</label>
	 <div class="col-sm-5">
 <input type="text" class="form-control" required="required" value="<?php echo $edit['keterangan'];?>" name="keterangan">
	</div>
  </div> 
  <div class="form-group">
    <label class="col-sm-4 control-label">MASA BERLAKU</label>
    <div class="col-sm-3">
    <div class="input-group">
  <div class="input-group-addon">
	<i class="fa fa-calendar"></i>
  </div>
  <input type="text" name="masa_berlaku" required="required" class="form-control pull-right" value="<?php echo $edit['masa_berlaku'];?>" id="reservation"/>
</div><!-- /.input group -->
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
<!----- ------------------------- END EDIT DATA MASTER KETERANGAN ------------------------- ----->
<?php	
break;
case "detail_pindah" :
$data=_query("SELECT * FROM surat_keterangan WHERE id_surat_keterangan='$_GET[id_surat_keterangan]'");
$edit=_fetch_array($data);
?>
<!----- ------------------------- LIHAT DATA KETERANGAN WARGA ------------------------- ----->
<h3 class="box-title margin text-center">Detail Data Keterangan Warga "<?php echo $_GET['id_surat_keterangan']; ?>"</h3>
<hr/>
	 	
<form class="form-horizontal" action="<?php echo $aksi?>?module=surat_keterangan&aksi=edit" role="form" method="post">             

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="glyphicon glyphicon-thumbs-up"></i> Detail Informasi Data Keterangan Warga </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
 <div class="form-group">
    <label class="col-sm-4 control-label">ID PINDAH / TANGGAL PINDAH</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" readonly name="id_surat_keterangan" value="<?php echo $edit['id_surat_keterangan'];?>">	  
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
