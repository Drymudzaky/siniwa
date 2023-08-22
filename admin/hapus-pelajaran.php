<?php
include "../conn.php";
$kode_ksk = $_GET['kd'];

$query = mysql_query("DELETE FROM ekbisksk WHERE kode_ksk='$kode_ksk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'pelajaran.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'pelajaran.php'</script>";	
}
?>