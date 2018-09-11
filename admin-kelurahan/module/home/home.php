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
		<div class="small-box bg-aqua">
						<div class="inner">
							<?php $siswa = mysql_num_rows(mysql_query("SELECT * FROM data_warga")); ?>
							<h3><?php echo $siswa; ?></h3>
							<p>Data Warga</p>
						</div>
						<div class="icon">
							<i class="fa fa-graduation-cap"></i>
						</div>
						<a href="?module=warga" class="small-box-footer">Klik disini <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<?php $kematian = mysql_num_rows(mysql_query("SELECT * FROM kematian")); ?>
							<h3><?php echo $kematian; ?></h3>
							<p>Kematian</p>
						</div>
						<div class="icon">
							<i class="fa fa-institution"></i>
						</div>
						<a href="?module=kematian" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<?php $pindah = mysql_num_rows(mysql_query("SELECT * FROM pindah")); ?>
							<h3><?php echo $pindah; ?></h3>
							<p>Pindah</p>
						</div>
						<div class="icon">
							<i class="fa fa-street-view"></i>
						</div>
						<a href="?module=pindah" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				
		
		<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-purple">
						<div class="inner">
							<?php $user = mysql_num_rows(mysql_query("SELECT * FROM user")); ?>
							<h3><?php echo $user; ?></h3>
							<p>Pengguna</p>
						</div>
						<div class="icon">
							<i class="fa fa-user-md"></i>
						</div>
						<a href="?module=user" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div><!-- ./col -->
				
		</div>
		
		
		<?php
#include ("../inc/fungsi_hdt"); 
 $sql = "SELECT status_pindah, COUNT(id_pindah) AS qty FROM  `pindah` GROUP BY status_pindah";	
 $hasil = mysql_query($sql);
 include('config.php');
?>
 
      <!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
      <script src="http://code.highcharts.com/modules/exporting.js"></script-->
	  
<script src="module/js/highcharts.js"></script>
<div class="row">
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Pindah</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
	<script type="text/javascript">
       $(function () {
		   
    $('#bola').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false,
        },
        title: {
            text: 'Data Pindah berdasarkan Status Pindah'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Data Pindah Desa XYZ',
            data: [
			<?php			
			while($data=mysql_fetch_array($hasil))
			{ ?>
                ['<?php echo $data['status_pindah']?>',   <?php echo $data['qty']?>],               
		   <?php
		   }//end while
		   ?>
            ]
        }]
    });
});   
    </script>
   <div id="bola" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>                  
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
<div class="col-md-6">
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Data Cluster</h3>
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">

<?php
$koneksi     = mysqli_connect("localhost", "root", "", "rkc");
$mitra      = mysqli_query($koneksi, "SELECT sum(thn_pend) as 'jumlah' FROM detail_mitra UNION ALL SELECT sum(harga) FROM jenis_barang UNION ALL SELECT sum(harga2) FROM detail_langganan");

 ?>
<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-9">
    <title>Demo Grafik Batang</title>
    <script src="js/Chart.js"></script>
	 <script src="module/js/Chart.js"></script>
	
    <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>
    <div class="container">
            <canvas id="demobar" width="100" height="100"></canvas>
    </div>

      	<script  type="text/javascript">

    	  var ctx = document.getElementById("demobar").getContext("2d");
    	  var data = {
    	            labels: ["Mitra","Marketing","Langganan"],
    	            datasets: [
    	            {
    	              label: "Data Pemasukan",
    	              data: [<?php while ($p = mysqli_fetch_array($mitra)) { echo '"' . $p['jumlah'] . '",';}?>],
                    backgroundColor: [
                      "rgba(59, 100, 222, 1)",
                      "rgba(203, 222, 225, 0.9)",
                      "rgba(102, 50, 179, 1)",
                      "rgba(201, 29, 29, 1)",
                      "rgba(81, 230, 153, 1)",
                      "rgba(246, 34, 19, 1)"]
    	            }
    	            ]
    	            };

    	  var myBarChart = new Chart(ctx, {
    	            type: 'bar',
    	            data: data,
    	            options: {
    	            barValueSpacing: 20,
    	            scales: {
    	              yAxes: [{
    	                  ticks: {
    	                      min: 0,
    	                  }
    	              }],
    	              xAxes: [{
    	                          gridLines: {
    	                              color: "rgba(0, 0, 0, 0)",
    	                          }
    	                      }]
    	              }
    	          }
    	        });
    	</script>

  </body>
</html>
<?php $query_j = mysql_query( $sql_j ) or die(mysql_error());  ?>
<div id='container'></div>		
</div></div>
</div> </div> 

<div id='container'></div>		
</div></div>
</div> 



		