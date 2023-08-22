<?php
$namafolder="gambar_siswa/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("smk")  or die("Gagal");*/
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $kode_siswa    = $_POST['kode_siswa'];
        $npm           = $_POST['npm'];
        $nama_siswa    = $_POST['nama_siswa'];
        $kelamin       = $_POST['kelamin'];
        $agama         = $_POST['agama'];
        $jurusan       = $_POST['jurusan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $no_telepon    = $_POST['no_telepon'];
        $tahun_angkatan= $_POST['tahun_angkatan'];
        $email         = $_POST['email'];
        $nama_ksk      = $_POST['nama_ksk'];
        $level_ksk     = $_POST['level_ksk'];
        $username      = $_POST['username'];
        $password      = $_POST['password'];


    $ceknis = mysql_query("SELECT * FROM siswa where npm=$npm")or die(mysql_error());
    if (mysql_num_rows($ceknis)>=1) {
        echo "<script>alert('NPM tersebut sudah digunakan'); window.location = 'input-siswa.php' </script>";
        die();
    }

		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO siswa(kode_siswa,npm,nama_siswa,kelamin,agama,tanggal_lahir,no_telepon,tahun_angkatan,email,nama_ksk,level_ksk,username,password,gambar) VALUES
            ('$kode_siswa','$npm','$nama_siswa','$kelamin','$agama','$tanggal_lahir','$no_telepon','$tahun_angkatan','$email','$nama_ksk','$level_ksk,$username,$password,'$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
        /** echo "Gambar berhasil dikirim ke direktori".$gambar;
			echo "<p>User Id  : $user_id</p>";
            echo "<p>Username : $username</p>";
            echo "<p>Password : $password</p>";
            echo "<p>Fullname : $fullname</p>";
            echo "<p>Gambar   : $gambar</p>";**/
            echo "<script>alert('Data berhasil dimasukan!'); window.location = 'siswa.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar / Gambar Harus dibawah 1MB";
}

/*include "../conn.php";
$user_id  = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$query = mysql_query("INSERT INTO admin (user_id, username, password, fullname) VALUES ('$user_id', '$username', '$password', '$fullname')");
if ($query){
	echo "<script>alert('Data Admin Berhasil dimasukan!'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Data Admin Gagal dimasukan!'); window.location = 'admin.php'</script>";	
}*/


?>