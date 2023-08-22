<?php
include "../conn.php";
$kode_ksk   = $_POST['kode_ksk'];
$tahun_ajar   = $_POST['tahun_ajar'];
$nama_ksk   = $_POST['nama_ksk'];
$kelas        = $_POST['kelas'];
$level_ksk    = $_POST['level_ksk'];


$cekwalikelas = mysql_query("SELECT * from kelas where level_ksk='$level_ksk'")or die(mysql_error());
	if(mysql_num_rows($cekwalikelas)>=1){
		echo "<script>alert('Nama KSK tersebut sudah menjadi Nama KSK anda'); window.location = 'input-kelas.php' </script>";
	}else {
$sqlCek="SELECT * FROM kelas WHERE nama_ksk='$nama_ksk' AND tahun_ajar='$tahun_ajar'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Nama Kelas<strong> $nama_ksk </strong> dengan <strong>tahun ajaran</strong> yang sama sudah dibuat";
	} else {
    
$query = mysql_query("INSERT INTO kelas (kode_ksk, tahun_ajar, nama_ksk, kelas, level_ksk) VALUES 
                      ('$kode_ksk', '$tahun_ajar', '$nama_ksk' , '$kelas', '$level_ksk')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'kelas.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'kelas.php'</script>";	
}
}
}
?>