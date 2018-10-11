<?php
$koneksi=_connect("localhost","root","")
or
die("can't connect to database");
$db=_select_db("apdp",$koneksi);
?>
