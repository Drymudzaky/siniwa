<?php
include "../conn.php";
$kd_informasi   = $_POST['kd_informasi'];
$judul   = $_POST['judul'];
$deskripsi   = $_POST['deskripsi'];
$tgl_upload        = $_POST['tgl_upload'];


$cekwalikelas = mysql_query("SELECT * from tbl_informasi where kd_informasi='$kd_informasi'")or die(mysql_error());
	if(mysql_num_rows($cekinformasi)>=1){
		echo "<script>alert('Informasi tersebut sudah ditambahkan'); window.location = 'input-informasi.php' </script>";
	}else {
$sqlCek="SELECT * FROM tbl_informasi WHERE kd_informasi='$kd_informasi' AND judul='$judul'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Informasi<strong> $judul </strong> dengan <strong>deskripsi</strong> yang sama sudah dibuat";
	} else {
    
$query = mysql_query("INSERT INTO tbl_informasi (kd_informasi, judul, deskripsi, tgl_upload) VALUES 
                      ('$kd_informasi', '$judul', '$deskripsi' , '$tgl_upload')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'informasi_akademik.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'informasi_akademik.php'</script>";	
}
}
}
?>