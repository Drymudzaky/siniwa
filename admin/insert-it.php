<?php
include "../conn.php";
$kode_ksk 	= $_POST['kode_ksk'];
$nama_ksk 	= $_POST['nama_ksk'];
$jurusan   	= $_POST['jurusan'];
$level_ksk 	= $_POST['level_ksk'];
$ksk_it		= $_POST['ksk_it'];

#    $ceknis = mysql_query("SELECT * FROM pelajaran where nama_pelajaran=$nama_pelajaran")or die(mysql_error());
#   if (mysql_num_rows($ceknis)>=1) {
#        echo "<script>alert('Nama Pelajaran Sudah di Input'); window.location = 'input-siswa.php' </script>";
#        die();
#  }

$query = mysql_query("INSERT INTO itksk (kode_ksk, nama_ksk, level_ksk, jurusan, ksk_it) VALUES 
                      ('$kode_ksk', '$nama_ksk', '$level_ksk', '$jurusan', '$ksk_it')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'it.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'it.php'</script>";	
}
?>