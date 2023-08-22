<?php
include "../conn.php";
$kode_siswa    = $_POST['kode_siswa'];
$npm           = $_POST['npm'];
$nama_siswa    = $_POST['nama_siswa'];
$kelamin       = $_POST['kelamin'];
$agama         = $_POST['agama'];
$jurusan	   = $_POST['jurusan'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$no_telepon    = $_POST['no_telepon'];
$tahun_angkatan= $_POST['tahun_angkatan'];
$email         = $_POST['email'];
$nama_ksk      = $_POST['nama_ksk'];
$level_ksk     = $_POST['level_ksk'];
$username	   = $_POST['username'];
$password      = $_POST['password'];

$query = mysql_query("UPDATE siswa SET npm='$npm', nama_siswa='$nama_siswa', kelamin='$kelamin', agama='$agama', jurusan='$jurusan', tanggal_lahir='$tanggal_lahir',  no_telepon='$no_telepon', tahun_angkatan='$tahun_angkatan', email='$email', nama_ksk='$nama_ksk' level_ksk='$level_ksk', username='$username' , password='$password' WHERE kode_siswa='$kode_siswa'")or die(mysql_error());
if ($query){
header('location:siswa.php');	
} else {
	echo "gagal";
    }
?>