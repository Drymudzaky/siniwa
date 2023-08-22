<?php
include "../conn.php";
$kode_ksk   = $_POST['kode_ksk'];
$tahun_ajar   = $_POST['tahun_ajar'];
$kelas        = $_POST['kelas'];
$nama_ksk   = $_POST['nama_ksk'];
$level_ksk    = $_POST['level_ksk'];

$query = mysql_query("UPDATE kelas SET tahun_ajar='$tahun_ajar', kelas='$kelas', nama_ksk='$nama_ksk', level_ksk='$level_ksk', status_aktif='$status_aktif' WHERE kode_ksk='$kode_ksk'")or die(mysql_error());
if ($query){
header('location:kelas.php');	
} else {
	echo "gagal";
    }
?>