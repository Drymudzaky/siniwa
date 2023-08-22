<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smk";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'kode_siswa',
    1 => 'npm', 
	2 => 'nama_siswa',
	3 => 'kelamin',
    4 => 'agama',
    5 => 'jurusan',
    6 => 'tanggal_lahir',
    7 => 'no_telepon',
    8 => 'tahun_angkatan',
    9 => 'email',
    10 => 'nama_ksk',
    11 => 'level_ksk',
    12 => 'username',
    13 => 'password'
);

// getting total number records without any search
$sql = "SELECT kode_siswa, npm, nama_siswa, kelamin, agama, jurusan, tanggal_lahir, no_telepon, tahun_angkatan, email, nama_ksk, level_ksk, username, password";
$sql.=" FROM siswa";
$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Siswa");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_siswa, nis, nama_siswa, kelamin, agama, jurusan, tanggal_lahir, no_telepon, tahun_angkatan, email, nama_ksk ";
	$sql.=" FROM siswa";
	$sql.=" WHERE kode_siswa LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR npm LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_siswa LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kelamin LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR agama LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jurusan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal_lahir LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR no_telepon LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tahun_angkatan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nama_ksk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR level_ksk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR password LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Siswa");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Siswa"); // again run query with limit
	
} else {	

	$sql = "SELECT kode_siswa, npm, nama_siswa, kelamin, agama, jurusan, tanggal_lahir, no_telepon, tahun_angkatan, email, nama_ksk, level_ksk, username, password";
	$sql.=" FROM siswa";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Siswa");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_siswa"];
    $nestedData[] = $row["npm"];
	$nestedData[] = $row["nama_siswa"];
	$nestedData[] = $row["kelamin"];
    $nestedData[] = $row["agama"];
    $nestedData[] = $row["jurusan"];
    $nestedData[] = $row["tanggal_lahir"];
    $nestedData[] = $row["no_telepon"];
    $nestedData[] = $row["tahun_angkatan"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["nama_ksk"];
    $nestedData[] = $row["level_ksk"];
    $nestedData[] = $row["username"];
    $nestedData[] = $row["password"];
    $nestedData[] = '<td><center>
                     <a href="edit-siswa.php?kd='.$row['kode_siswa'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="hapus-siswa.php?kd='.$row['kode_siswa'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_siswa'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
				    
	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
