<?php 
include "head.php";
?>
          <section class="content-header">
            <h1>
             Laporan
              <small>Data Pindah Warga Kecamatan Tawang Kota Tasikmalaya</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
              <li class="active">Data Pindah Warga Kecamatan Tawang Kota Tasikmalaya</li>
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
                <h3 class="box-title center">Daftar Pindah Warga</h3>
				<span class="pull-right">
				Tasikmalaya, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
<table class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>	
		<th class="col-sm-1">NO KK</th>	
		<th class="col-sm-1">NIK</th>
        <th class="col-sm-2">NAMA</th>
		<th class="col-sm-2">TANGGAL PINDAH</th>
		<th class="col-sm-2">ALAMAT ASAL</th>
		<th class="col-sm-1">DESA</th>
		<th class="col-sm-1">RT</th>
		<th class="col-sm-1">RW</th>
		<th class="col-sm-2">ALAMAT PINDAH</th>
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$a = buildQueryDesaId(NULL, "a");
$sql = "SELECT a.*, b.*, dd.name as nama_desa FROM data_warga a join pindah b on b.id=a.id left join daerah_desa dd on dd.id=a.desa_id where a.id=b.id and $a";
$tampil = _query($sql);
$no=1;
while ($data = _fetch_array($tampil)) { ?>

	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['no_kk']; ?></td>
	<td><?php echo $data['nik']; ?></td>
	<td> <?php echo $data['nama']; ?></td>
	<td> <?php echo $data['tanggal_pindah']; ?></td>
	<td> <?php echo $data['alamat']; ?></td>
	<td> <?php echo $data['nama_desa']; ?></td>
	<td> <?php echo $data['rt']; ?></td>
	<td> <?php echo $data['rw']; ?></td>
	<td> <?php echo $data['alamat_pindah']; ?></td>
	
<?php
}
?>
	</tr>
			</tbody>
		</table>	
              </div><!-- /.box-body -->
            </div>
          </section><!-- /.content -->
		
		  	  Camat Kecamatan Tawang Kota Tasikmalaya
			 </div> 
		  
		              <br> ______H. BUDY RACHMAN, S.Sos., M.SI._____</br>
		  
<?php
include "tail.php";
?>
