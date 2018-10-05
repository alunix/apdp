
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
<i class="fa fa-info"></i>Informasi Kelurahan
</div>

<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-success "  style="margin:20px 20px 20px 20px">
                <h4><?php echo "Hai $_SESSION[nama]"; ?> </h4>
                <p><?php echo "Selamat datang di halaman Administrator Kelurahan Aplikasi Sistem Informasi Kependudukan! "; ?></p>
            </div>
        </div>
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

    <script src="<?=BASE_URL."/highcharts/code/highcharts.js";?>"></script>
    <script src="<?=BASE_URL."/highcharts/code/modules/exporting.js";?>"></script>
    <script src="<?=BASE_URL."/highcharts/code/modules/export-data.js";?>"></script>

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
                    <div id="status-pindah" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        $(function () {

                            Highcharts.chart('status-pindah', {
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

                                        }

                                    }
                                },
                                series: [{
                                    type: 'pie',
                                    name: 'Data Pindah ',
                                    data: [
                                        <?php
                                        $desaIds = getMultipleDesaId();
                                        if (empty($desaIds)) $desaIds = array("false");
                                        $sql = "SELECT status_pindah, jumlah from statistik_pindah WHERE desa_id IN ('".implode("','", $desaIds)."') group by status_pindah";
                                        $datas = _fetchMultipleFromSql($sql);
                                        foreach($datas as $data)
                                        { ?>
                                        ['<?php echo $data['status_pindah']?>',   <?php echo $data['jumlah']?>],
                                        <?php
                                        }//end while
                                        ?>
                                    ]
                                }]
                            });
                        });
                    </script>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Pendatang</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="status-pendatang" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        $(function () {


                            Highcharts.chart('status-pendatang', {
                                title: {
                                    text: 'Statistik Pendaftang Bulanan',
                                },
                                yAxis: {
                                    title: {
                                        text: 'Orang'
                                    }
                                },
                                series: [{
                                    name: 'Orang',
                                    data: [
                                        <?php
                                        $desaIds = getMultipleDesaId();
                                        if (empty($desaIds)) $desaIds = array("false");
                                        $sql = "SELECT tahun_datang, bulan_datang, sum(jumlah) as jumlah from statistik_pendatang_bulanan WHERE desa_id IN ('".implode("','", $desaIds)."') and tahun_datang='".date('Y')."' group by tahun_datang, bulan_datang";
                                        $datas = _fetchMultipleFromSql($sql);

                                        for ($i=1;$i<=12;$i++) {
                                            $hasData = array_filter($datas, function ($d) use($i) {
                                                return $d['tahun_datang'] == date('Y') && $i==$d['bulan_datang'];
                                            });
                                            $hasData = array_values($hasData);
                                            $hasData = @$hasData[0];
                                            ?>
                                            ['<?=date('Y');?>-<?=strlen($i)>=2?$i:"0$i";?>', <?=$hasData['jumlah']?$hasData['jumlah']:"0";?>],
                                            <?php
                                        }

                                        ?>
                                    ]
                                }]
                            });
                        });
                    </script>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

</div>

		
