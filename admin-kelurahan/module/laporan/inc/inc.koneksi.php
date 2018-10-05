<?php
$server = "localhost"; //
$username = "root";  //
$password = ""; //
$database = "apdp";

$konek = _connect($server, $username, $password) or die ("Gagal konek ke server MySQL" ._error());
$bukadb = _select_db($database) or die ("Gagal membuka database $database" ._error());

?>
