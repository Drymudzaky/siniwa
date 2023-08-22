<?php
include "../conn.php";
$kode_ksk = $_GET['kd'];

$query = mysql_query("DELETE FROM kesehatanksk WHERE kode_ksk='$kode_ksk'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'kesehatan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'kesehatan.php'</script>";	
}
?>