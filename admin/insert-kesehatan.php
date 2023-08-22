<?php
include "../conn.php";
$kode_ksk = $_POST['kode_ksk'];
$nama_ksk = $_POST['nama_ksk'];
$jurusan = $_POST['jurusan'];
$level_ksk = $_POST['level_ksk'];
$ksk_kesehatan   = $_POST['ksk_kesehatan'];

#    $ceknis = mysql_query("SELECT * FROM pelajaran where nama_pelajaran=$nama_pelajaran")or die(mysql_error());
#   if (mysql_num_rows($ceknis)>=1) {
#        echo "<script>alert('Nama Pelajaran Sudah di Input'); window.location = 'input-siswa.php' </script>";
#        die();
#  }

$query = mysql_query("INSERT INTO kesehatanksk (kode_ksk, nama_ksk, jurusan, level_ksk, ksk_kesehatan) VALUES 
                      ('$kode_ksk', '$nama_ksk', '$jurusan', '$level_ksk', '$ksk_kesehatan')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'kesehatan.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'kesehatan.php'</script>";	
}
?>