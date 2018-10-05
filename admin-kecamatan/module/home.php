<?php
include ("../koneksi.php");  ?>
<br/>
<div style="margin-right:10%;margin-left:15%" class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</h4>
</div>
<!-- <div class="">
<?php 
$data=mysql_query("SELECT * FROM lokasi_krj");
while ($k = mysql_fetch_array($data)) { 
?>

<div class="col-xs-1 text-center">
  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
  <div class="knob-label"><?php echo $k['nm_lokasi']; ?></div>
</div> 
<?php } ?>
</div><!-- /.row -->
<div class="box box-solid box-primary">
<div class="box-header">
<i class="fa fa-info"></i>Informasi Kecamatan Tawang
</div>
<div class="box-body">
		<div class="row">
			<div class="callout callout-info "  style="margin:20px 20px 20px 20px">
				<h4><?php echo "Hai $_SESSION[nama]"; ?> </h4>
				<p><?php echo "Selamat datang di halaman Administrator Kelurahan Aplikasi Sistem Informasi Kependudukan! "; ?></p>
			</div>					
			<div class="callout callout-info "  style="margin:20px 20px 20px 20px">
				<h4><?php echo "Visi Kantor Kecamatan Tawang"; ?> </h4>
				<p><?php echo "“BERDASARKAN IMAN DAN TAQWA MEWUJUDKAN PELAYANAN PRIMA DI KECAMATAN TAWANG MENUJU MASYARAKAT MAJU DAN SEJAHTERA”"; ?></p>
			</div>		
		<div class="callout callout-info "  style="margin:20px 20px 20px 20px">
				<h4><?php echo "Misi Kantor Kecamatan Tawang"; ?> </h4>
				
					<p>1. Meningkatkan kualitas Sumber Daya Manusia, Aparatur. Meningkatkan Koordinasi dan Pengawasan penyelenggaraan Pemerintah dalam rangka pelayanan prima kepada Masyarakat</p>
					<p>2. Meningkatkan potensi, peran serta dan partisipasi masyarakat dalam pembangunan.</p>
					<p>3. Meningkatkan Pembangunan Infrastruktur yang berbasiskan partisipasi Masyarakat.</p>
				
				<br>
			</div>		
		<div class="col-lg-3 col-xs-6">
		</div><!-- ./col -->
				
		</div>
</div>
</div><!-- /.row --
