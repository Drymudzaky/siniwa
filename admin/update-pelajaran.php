<?php
include "../conn.php";
$kode_ksk = $_POST['kode_ksk'];
$nama_ksk = $_POST['nama_ksk'];
$jurusan = $_POST['jurusan'];
$level_ksk     = $_POST['level_ksk'];
$ksk_ekbis     = $_POST['ksk_ekbis'];

$query = mysql_query("UPDATE pelajaran SET nama_ksk='$nama_ksk', jurusan='$jurusan', level_ksk='$level_ksk', ksk_ekbis='$ksk_ekbis' WHERE kode_ksk='$kode_ksk'")or die(mysql_error());
if ($query){
header('location:pelajaran.php');	
} else {
	echo "gagal";
    }
?>