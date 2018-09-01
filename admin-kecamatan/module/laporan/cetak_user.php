<?php 
include "head.php";
?>
          <section class="content-header">
            <h1>
             Laporan
              <small>Data User </small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
              <li class="active">Data User</li>
            </ol>
          </section>

           
          <section class="content">
            <div class="text-center">
			<h3><img src="inc/zt.png"/></h3>
			<b>Jl. Cilembang No.114, Linggajaya, Mangkubumi, <br/>
			Tasikmalaya, Jawa Barat 46123, Indonesia</b>
			</div><br/>
             
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title center">Daftar User</h3>
				<span class="pull-right">
				Tasikmalaya, <?php echo Indonesia2Tgl(date('Y-m-d'));?> 
				</span>					
              </div>
              <div class="box-body">
<table class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">NO</th>	
		<th class="col-sm-1">ID User</th>	
		<th class="col-sm-3">Nama</th>				
		<th class="col-sm-2">Username</th>	
		<th class="col-sm-1">Level</th> 
		<th class="col-sm-2">No HP</th>	
		<th class="col-sm-1">Status</th> 
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM user";
$tampil = mysql_query($sql);
$no=1;
while ($data = mysql_fetch_array($tampil)) { ?>

	<tr>
	<td><?php echo $no++; ?></td>
	<td><?php echo $data['id_user']; ?></td>
	<td><?php echo $data['nama'] ; ?></td>
	<td><?php echo $data['user']; ?></td>
	<td><?php echo $data['level']; ?></td>	
	<td><?php echo $data['no_hp']; ?></td>
	<td><?php echo $data['blokir']; ?></td>	
	
<?php
}
?>
	</tr>
			</tbody>
		</table>	
              </div><!-- /.box-body -->
            </div>
          </section><!-- /.content -->
<?php
include "tail.php";
?>