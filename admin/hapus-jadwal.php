<?php
include "../conn.php";
$kd_jadwal = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_jadwal WHERE kd_jadwal='$kd_jadwal'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'jadwal.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'jadwal.php'</script>";	
}
?>