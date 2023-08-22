<?php
include "../conn.php";
$kode_ksk = $_POST['kode_ksk'];
$nama_ksk = $_POST['nama_ksk'];
$jurusan     = $_POST['jurusan'];
$level_ksk     = $_POST['level_ksk'];
$ksk_it     = $_POST['ksk_it'];

$query = mysql_query("UPDATE itksk SET nama_ksk='$nama_ksk', jurusan='$jurusan', level_ksk='$level_ksk', ksk_it='$ksk_it' WHERE kode_ksk='$kode_ksk'")or die(mysql_error());
if ($query){
header('location:it.php');	
} else {
	echo "gagal";
    }
?>