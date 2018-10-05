
<?php
$aksi="module/grafik/grafik_aksi.php";

switch(@$_GET['aksi']){
default:
?>

<?php
$koneksi  = mysqli_connect("localhost", "root", "", "apdp");
$warga  = mysqli_query($koneksi, "SELECT COUNT(id) AS ' data warga' FROM data_warga");
$kematian = mysqli_query($koneksi, "SELECT COUNT(id_kematian) AS ' kematian' FROM kematian");
$pindah = mysqli_query($koneksi, "SELECT COUNT(id_pindah) AS 'pindah' FROM pindah");
 ?>
<!DOCTYPE html>
<html>
  <head>
	<div class="box-body">
<form class="form-horizontal" action="<?php echo $aksi?>?module=grafik&aksi=tambah" role="form" method="post">    

<div class="box box-solid box-danger">
<div class="box-header">
<h3 class="btn btn disabled box-title">
<i class="fa fa-bar-chart"></i> Grafik </h3>
	<a class="btn btn-default btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
	<i class="fa fa-minus"></i></a>
		</div>	
	<div class="box-body">
	
    <meta charset="utf-8">
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
    	            labels: ["Data Warga","Kematian","Pindah"],
    	            datasets: [
    	            {
    	              label: "Grafik Data Warga",
    	              data: [<?php while ($p = mysqli_fetch_array($warga)) { echo '"' . $p['data warga'] . '",';}?>
					  
					 <?php while ($p = mysqli_fetch_array($kematian)) { echo '"' . $p['kematian'] . '",';}?> 
					 	 <?php while ($p = mysqli_fetch_array($pindah)) { echo '"' . $p['pindah'] . '",';}?>],
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
</div>
  </div> 
</form>
</div> 
<?php
break;
}
?>
