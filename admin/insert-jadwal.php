<?php
include "../conn.php";
$kd_jadwal 			= $_POST['kd_jadwal'];
$thn_akademik   	= $_POST['thn_akademik'];
$nama_dosen      	= $_POST['nama_dosen'];
$kd_jurusan  		= $_POST['kd_jurusan'];
$nama_ksk 			= $_POST['nama_ksk'];
$hari  				= $_POST['hari'];
$ruang  			= $_POST['ruang'];
$smt  				= $_POST['smt'];
$kelas  			= $_POST['kelas'];
$jam_mulai  		= $_POST['jam_mulai'];
$jam_selesai  		= $_POST['jam_selesai'];


$cekjadwal = mysql_query("SELECT * from tbl_jadwal where kd_jadwal='$kd_jadwal'")or die(mysql_error());
	if(mysql_num_rows($cekinformasi)>=1){
		echo "<script>alert('Jadwal tersebut sudah ditambahkan'); window.location = 'input-jadwal.php' </script>";
	}else {
$sqlCek="SELECT * FROM tbl_jadwal WHERE kd_jadwal='$kd_jadwal' AND thn_akademik='$thn_akademik'";
	$qryCek=mysql_query($sqlCek) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($qryCek)>=1){
		$pesanError[] = "Maaf, Jadwal<strong> $kd_jadwal </strong> dengan <strong>deskripsi</strong> yang sama sudah dibuat";
	} else {
    
$query = mysql_query("INSERT INTO tbl_jadwal (kd_jadwal, thn_akademik, nama_dosen, kd_jurusan, nama_ksk, hari, ruang, smt, kelas, jam_mulai, jam_selesai) VALUES 
                      ('$kd_jadwal', '$thn_akademik', '$nama_dosen' , '$kd_jurusan' , '$nama_ksk' , '$hari' , '$ruang' , '$smt' , '$kelas' , '$jam_mulai' , '$jam_selesai')")or die(mysql_error());
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'Jadwal.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'Jadwal.php'</script>";	
}
}
}
?>