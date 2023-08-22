<?php
include "../conn.php";
$kode_ksk = $_POST['kode_ksk'];
$nama_ksk = $_POST['nama_ksk'];
$jurusan = $_POST['jurusan'];
$level_ksk     = $_POST['level_ksk'];
$ksk_kesehatan     = $_POST['ksk_kesehatan'];

$query = mysql_query("UPDATE kesehatanksk SET nama_ksk='$nama_ksk', jurusan='$jurusan', level_ksk='$level_ksk', ksk_kesehatan='$ksk_kesehatan' WHERE kode_ksk='$kode_ksk'")or die(mysql_error());
if ($query){
header('location:kesehatan.php');	
} else {
	echo "gagal";
    }
?>