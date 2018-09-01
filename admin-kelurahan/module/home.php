<?php
include ("../inc/koneksi.php"); 
include ("../inc/fungsi_hdt");  ?>
<br/>
<div style="margin-right:10%;margin-left:15%" class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</p>
</div> 
<div class="box box-solid box-success">
<div class="box-header">
<i class="fa fa-info"></i>Informasi
</div>

<div class="box-body">
		<div class="row">
			<div class="callout callout-success "  style="margin:20px 20px 20px 20px">
				<h4><?php echo "Hai $_SESSION[nama]"; ?> </h4>
				<p><?php echo "Selamat datang di halaman Administrator Kelurahan Aplikasi Sistem Informasi Kependudukan! "; ?></p>
			</div>							
		<div class="col-lg-3 col-xs-6">
		</div><!-- ./col -->
				
		</div>
</div>