<?php
include "../conn.php";
$kode_ksk = $_POST['kode_ksk'];
$nama_ksk = $_POST['nama_ksk'];
$jurusan   = $_POST['jurusan'];
$level_ksk = $_POST['level_ksk'];
$ksk_ekbis = $_POST['ksk_ekbis'];


#    $ceknis = mysql_query("SELECT * FROM pelajaran where nama_pelajaran=$nama_pelajaran")or die(mysql_error());
#   if (mysql_num_rows($ceknis)>=1) {
#        echo "<script>alert('Nama Pelajaran Sudah di Input'); window.location = 'input-siswa.php' </script>";
#        die();
#  }

$query = mysql_query("INSERT INTO ekbisksk (kode_ksk, nama_ksk, jurusan, level_ksk, ksk_ekbis) VALUES 
                      ('$kode_ksk', '$nama_ksk', '$jurusan', '$level_ksk', '$ksk_ekbis')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'pelajaran.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'pelajaran.php'</script>";	
}
?>