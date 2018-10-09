<?php 
include "head.php";
?>
          <section class="content-header">
            <h1>
             Laporan
              <small>Data Warga Kecamatan Tawang Kota Tasikmalaya</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Laporan</a></li>
              <li class="active">Data Ketarangan Warga Kecamatan Tawang Kota Tasikmalaya</li>
            </ol>
          </section>

           
        <section class="content">
            <div class="text-center">
			<img src="inc/tasik.png" alt="gambar tasik" height="120px"
            align="left" />
			<small><h3>PEMERINTAH KOTA TASIKMALAYA <p> KECAMATAN TAWANG</p>
			<h5>Jl. Siliwangi No. 72 Kel. Kahuripan Kec. Tawang <br/>
			Kota Tasikmalaya, Jawa Barat, Indonesia
			</div><br/>
            <div class="box box-default" >		
              </div>
			    <div class="box box-default">
              </div>
			  
<div class="text-center"> <h4><u> Surat Keterangan </u></h4>
<p> <?php 
	$s=mysql_fetch_array(mysql_query("select id_surat_keterangan, pernyataan, keperluan, masa_berlaku, keterangan from surat_keterangan where id='$_GET[id]'"));
	?>
      <?php echo $s['id_surat_keterangan'];?> </p> 
</div>
<div class="text-left">
<?php 
	$b=mysql_fetch_array(mysql_query("select rt, rw, nama, nik, tempat_lhr, tanggal_lhr, jk, agama, pekerjaan, status_nikah, alamat from data_warga where id='$_GET[id]'"));
	?>
<?php 
	$c=mysql_fetch_array(mysql_query("select tanggal from surat_keterangan where id='$_GET[id]'"));
	?>	
		  <p > <?php echo $s['pernyataan'];?> RT   <?php echo $b['rt'];?>  / RW   <?php echo $b['rw'];?> pada tanggal  <?php echo IndonesiaTgl ($c['tanggal']);?> dengan ini menerangkan bahwa :</p>


<p>	Nama Lengkap 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['nama'];?> </p>
<p> NIK 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['nik'];?> </p>
<p> Tempat/Tanggal Lahir	&nbsp;&nbsp;&nbsp;:  <?php echo $b['tempat_lhr'] .", ". IndonesiaTgl($b['tanggal_lhr']); ?>  </p>
<p> Jenis Kelamin 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['jk'];?>  </p>
<p> Agama 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['agama'];?>  </p>
<p> Pekerjaan 				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['pekerjaan'];?>  </p>
<p> Status 					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['status_nikah'];?>  </p>
<p> Alamat					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $b['alamat'] ."&nbsp;RT / ". $b['rt'] ."&nbsp;RW / ". $b['rw'] ;?>  </p>
<p> Keperluan 				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $s['keperluan'];?>  </p>
<p> Masa Berlaku 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <?php echo $s['masa_berlaku'];?>  </p>
<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $s['keterangan'];?>  </p>
		  <div>
<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian surat keterangan ini dibuat agar dapat digunakan dengan sebagaimana mestinya. </p>
		  <div>
</tr>
			</tbody>
		</table>	
              </div><!-- /.box-body -->
            </div>
          </section><!-- /.content -->
		
		  	Lurah Kelurahan Kahuripan Kota Tasikmalaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camat Kecamatan Tawang Kota Tasikmalaya
			 </div> 
		  
		              <br><br><br>
					  ______H. BUDY RACHMAN, S.Sos., M.SI._____ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______H. BUDY RACHMAN, S.Sos., M.SI._____</br></br></br>
<?php
include "tail.php";
?>