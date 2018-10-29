
<br/>
<div style="margin-right:10%;margin-left:15%" class="alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</p>
</div> 
<div class="box box-solid box-primary">
<div class="box-header">
<i class="fa fa-info"></i>Informasi Kelurahan
</div>

<div class="box-body">
    <div class="row">

        <div class="col-md-12">
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
        </div>

    </div>

    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <?php $siswa = _num_rows(_query("SELECT * FROM data_warga")); ?>
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
                    <?php $kematian = _num_rows(_query("SELECT * FROM kematian")); ?>
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
                    <?php $pindah = _num_rows(_query("SELECT * FROM pindah")); ?>
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
                    <?php $user = _num_rows(_query("SELECT * FROM user")); ?>
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

</div>

		
