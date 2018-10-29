<?php
include '../bootstrap.php';
include  BASE_DIR."inc/cek_session.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Aplikasi Pengolahan Data Penduduk</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- daterange picker -->
    <link href="../aset/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../aset/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="../aset/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="../aset/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../aset/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../aset/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
	
    <!-- Bootstrap 3.3.4 -->
    <link href="../aset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../aset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../aset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../aset/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
	<script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  
 
	<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>
	
  </head>
  <body class="skin-red sidebar-mini fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
	  
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>APDP</b> APDP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>APDP&nbsp;</b> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->			  
				<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../aset/dist/img/admin.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">
				  <?php
				   echo $_SESSION['nama'];
				  ?>
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../aset/dist/img/admin.jpg" class="img-circle" alt="User Image" />
                   <p>
                      <?php echo $_SESSION['nama']; ?>
                      <small>(( <?php echo $_SESSION['level']; ?>
					  ))</small>
                    </p>
                  </li>                   
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="index.php?module=edit_user&id_user=<?php echo $_SESSION['id'];?>" class="btn btn-default btn-flat">&nbsp;<i class="fa fa-user"></i>&nbsp;Profil</a>
                    </div>
                    <div class="pull-right">
				
                      <a href="../logout.php" class="btn btn-default btn-flat">&nbsp;<i class="fa fa-power-off"></i>&nbsp;Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
			  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         <li style="margin:2%;">
			<table>
			<tr>
			<td rowspan="3"><img src="../aset/dist/img/admin.jpg"style="margin-right:15px;width:45px;height:45px;" class="img-circle" alt="User Image" /></td>
			<th><h5 class="text-red"> <?php echo $_SESSION['nama']; ?><p>((SUPER ADMIN))</p></h5>
			</th>
			
			<tr>
			<td><i class="text-red">
				<a href="index.php?module=edit_user&id_user=<?php echo $_SESSION['id'];?>" class="btn btn-xs btn-danger ">&nbsp;<i class="fa fa-user"></i>&nbsp;</a> 
				&nbsp;&nbsp;
			
				<a href="../logout.php" class="btn btn-xs btn-danger ">&nbsp;<i class="fa fa-power-off"></i>&nbsp;</a>&nbsp;&nbsp;
			</td>
			</tr>
			</tr>
			</table>
			</li>
            <?php
            include STRING_MATCHING_DIR."/form.php";
            ?>
          <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU NAVIGASI</li>
			<li><a href="?module=home"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
			<li><a href="?module=user"><i class="fa fa-user"></i> <span>User</span></a></li>
<!--			<li class="active treeview">-->
<!--			 <a href="#">-->
<!--                <i class="fa fa-tasks"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>-->
<!--              </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href='?module=kelurahan' ><i class="fa fa-user"></i><span>Data Kelurahan</span></a></li>-->
<!--                </ul>-->
<!--            </li>-->
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div style="background:url(../images/0.png)repeat;" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section  class="content-header">
          <h1> Aplikasi Pengolahan Data Penduduk (APDP)
          </h1>
          <ol class="breadcrumb">
		  <div>
           <li width="200"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></li> 
            <li align="left" width="30"></li>
            <li align="left" width="620"> <h4><div id="output" class="jam" ></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section  class="content">
 <!-- diini lah kita kasih artikel nya --> 
<div class="box box-danger">
</div>
	<?php include "isi.php";?>        		
 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Aplikasi Pengolahan Data Penduduk (APDP) Menggunakan Algoritma String Matching
        </div>
        <strong>Copyright &copy; 2018 <a href="#">Edited by Rellita Fikka Rahajeng</a>.</strong> All rights reserved.
		
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
		   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
	
	
	
	
	
	<!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
	
	
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

<script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../aset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../aset/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../aset/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../aset/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../aset/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="../aset/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="../aset/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="../aset/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="../aset/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../aset/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../aset/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='../aset/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../aset/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../aset/dist/js/demo.js" type="text/javascript"></script>
    <!-- Page script -->
    <!-- page script -->
	<script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_square-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_square-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-red',
          radioClass: 'iradio_flat-red'
        });
 
      });
    </script>
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>	
  </body>
</html>