<?php
include "../conn.php";
$kd_jadwal  = $_POST['kd_jadwal'];
$thn_akademik   = $_POST['thn_akademik'];
$nama_dosen       = $_POST['nama_dosen'];
$kd_jurusan   = $_POST['kd_jurusan'];
$nama_ksk  = $_POST['nama_ksk'];
$hari   = $_POST['hari'];
$ruang   = $_POST['ruang'];
$smt   = $_POST['smt'];
$kelas   = $_POST['kelas'];
$jam_mulai   = $_POST['jam_mulai'];
$jam_selesai   = $_POST['jam_selesai'];

$query = mysql_query("UPDATE tbl_jadwal SET kd_jadwal='$kd_jadwal', thn_akademik='$thn_akademik', nama_dosen='$nama_dosen', kd_jurusan='$kd_jurusan', nama_ksk='$nama_ksk', hari='$hari', ruang='$ruang', smt='$smt', kelas='$kelas', jam_mulai='$jam_mulai', jam_selesai=$jam_selesai WHERE kd_jadwal='$kd_jadwal'")or die(mysql_error());
if ($query){
header('location:jadwal.php');	
} else {
	echo "gagal";
    }
?>