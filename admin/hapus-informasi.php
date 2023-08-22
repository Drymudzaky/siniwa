<?php
include "../conn.php";
$kd_informasi = $_GET['kd'];

$query = mysql_query("DELETE FROM tbl_informasi WHERE kd_informasi='$kd_informasi'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'informasi_akademik.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'informasi_akademik.php'</script>";	
}
?>