<?php
function sukses_masuk($username,$pass){
	// Apabila username dan password ditemukan
	$login=mysql_query("SELECT * FROM user WHERE user='$username' AND pass='$pass' AND blokir='N'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
	if ($ketemu > 0){
	  session_start();
	  include "timeout.php";
		$_SESSION['username']     = $r['user']; 
		$_SESSION['passuser']     = $r['pass'];
		$_SESSION['level']    = $r['level'];
		if (strlen($r['desa_id']) == 10) {
            $_SESSION['selected_desa']    = $r['desa_id'];
        }

		
if ($r['level'] == "admin-kelurahan")
{  header('location:admin-kelurahan/');
/*input ke file log
$y= date('Y');
$m= date ('m'); 
$d=date('h');
file_put_contents('log.txt',"'".$r['username']."','".$r['nama_lengkap']."','".$y."'\n",FILE_APPEND);*/
}

else if ($r['level'] == "admin-kelurahan")
{ header('location:admin-kelurahan/?module=home'); 
}
else if ($r['level'] == "admin-kecamatan")
{ header('location:admin-kecamatan/?module=home'); 
}
		// session timeout
		$_SESSION['login'] = 1;
		timer();
		
	}
	return false;
}

function msg(){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'>
  <link href='css/reset.css' rel='stylesheet' type='text/css'>
  <link href='css/style_button.css' rel='stylesheet' type='text/css'>
  <center><br><br><br><br><br><br>Maaf, silahkan cek kembali <b>Username</b> dan <b>Password</b> Anda<br><br>Kesalahan $_SESSION[salah]";
  echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";
  return false;
}

function salah_blokir($username){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'>
  <link href='css/reset.css' rel='stylesheet' type='text/css'>
  <link href='css/style_button.css' rel='stylesheet' type='text/css'>
  <center><br><br><br><br><br><br>Maaf, Username <b>$username</b> telah <b>TERBLOKIR</b>, silahkan hubungi Administrator.";
  echo "<div style=''> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";
  return false;
}
function salah_username($username){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'>
  <link href='css/reset.css' rel='stylesheet' type='text/css'>
  <link href='css/style_button.css' rel='stylesheet' type='text/css'>
  <center><br><br><br><br><br><br>Maaf, Username <b>$username</b> tidak dikenal.";
  echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";	
  return false;
}

function salah_password(){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'>
  <link href='css/reset.css' rel='stylesheet' type='text/css'>
  <link href='css/style_button.css' rel='stylesheet' type='text/css'>
  <center><br><br><br><br><br><br>Maaf, silahkan cek kembali <b>Password</b> Anda<br><br>Kesalahan $_SESSION[salah]";
  echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=176></a>
  </div>";
  echo "<input type=button class='button buttonblue mediumbtn' value='KEMBALI' onclick=location.href='index.php'></a></center>";
   return false;
}

function blokir($username){
	mysql_query($sql);	 
	session_destroy();
	 return false;
}    

//mengambil status benfit/cost dari tabel kriteria
function getStatusKriteria($idkriteria){
  $q = mysql_query("SELECT * FROM kriteria where id_kriteria = '$idkriteria'");
  $d = mysql_fetch_array($q);
  return $d['tipe_kriteria'];
}

function getBobotKriteria($idkriteria){
  $q = mysql_query("SELECT * FROM kriteria where id_kriteria = '$idkriteria'");
  $d = mysql_fetch_array($q);
  return round($d['bobot']/100, 2);
}

function GetMaxMinArray($arraydata,$kriteria, $status){
  $arrayTemp = array();
  foreach($arraydata as $value){
      $arrayTemp[] = $value[$kriteria];
  }
  if(strtolower($status) == 'benefit')
      return max($arrayTemp);
  return min($arrayTemp);
}

//pada tahap 2 saw akan ada normalisasi
//fungsi ini dgunakan untuk menghitung normalisasi dari tiap-tiap data
function GetNormalisasi($data, $maxmin, $status){
  if(strtolower($status) == 'benefit'){
      return round( $data / $maxmin, 2);
  }else{
      return round($maxmin / $data, 2);
  }
}

function getSelectedNilai($nis, $kriteria)
{
  $q = mysql_query("SELECT id_nilai from rangking where nis = '$nis' and id_kriteria = '$kriteria'");
  $d = mysql_fetch_array($q);
  return $d['id_nilai'];
}
?>