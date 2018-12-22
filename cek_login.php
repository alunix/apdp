<?php
include './bootstrap.php';

$username= antiInjection($_POST['username']);
$pass	 = antiInjection($_POST['password']);
#$pass = anti_injection($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
//  echo "Sekarang loginnya tidak bisa di injeksi lho.";
?>
<script>
	alert('Sekarang loginnya tidak bisa di injeksi lho.');
	window.location.href='index.php';
</script>
<?php
}else{
	$login	=_query("SELECT * FROM user WHERE user='$username'");
	$ketemu	=_num_rows($login);
	if ($ketemu>0){
		$r		=_fetch_array($login);
		$pwd	=@$r['pass'];
		if ($r['blokir'] == 'Y'){
			salah_blokir($username);
			return false;
		}
		if ($pwd==$pass){
			sukses_masuk($username,$pass);
		}else{
			$salah =1;
			$_SESSION['salah']=@$_SESSION['salah']+$salah;
			if ($_SESSION['salah']>=3){
				blokir($username);
			}
			salah_password();
		}
	}else{
		salah_username($username);
	}
}
?>
