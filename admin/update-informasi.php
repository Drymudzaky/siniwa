<?php
include "../conn.php";
$kd_informasi   = $_POST['kd_informasi'];
$judul   = $_POST['judul'];
$deskripsi       = $_POST['deskripsi'];
$tgl_upload   = $_POST['tgl_upload'];

$query = mysql_query("UPDATE tbl_informasi SET kd_informasi='$kd_informasi', judul='$judul', deskripsi='$deskripsi', tgl_upload='$tgl_upload' WHERE kd_informasi='$kd_informasi'")or die(mysql_error());
if ($query){
header('location:informasi_akademik.php');	
} else {
	echo "gagal";
    }
?>