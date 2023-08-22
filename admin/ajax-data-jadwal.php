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
	0 => 'kd_jadwal',
    1 => 'thn_akademik', 
	2 => 'nama_dosen',
	3 => 'kd_jurusan',
    4 => 'kd_mk',
    5 => 'hari',
    6 => 'ruang',
    7 => 'smt',
    8 => 'kelas',
    9 => 'jam_mulai',
    10 => 'jam_selesai'
);

// getting total number records without any search
$sql = "SELECT kd_jadwal, thn_akademik, nama_dosen, kd_jurusan, kd_mk, hari, ruang, smt, kelas, jam_mulai, jam_selesai";
$sql.=" FROM tbl_jadwal";
$query=mysqli_query($conn, $sql) or die("ajax-data-jadwal.php: get tbl_jadwal");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kd_jadwal, thn_akademik, kd_dosen, kd_jurusan, kd_mk, hari, ruang, smt, kelas, jam_mulai, jam_selesai";
	$sql.=" FROM tbl_jadwal";
	$sql.=" WHERE kd_jadwal LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR thn_akademik LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_dosen LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kd_jurusan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kd_mk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR hari LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR ruang LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR smt LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kelas LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jam_mulai LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jam_selesai LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-jadwal.php: get tbl_jadwal");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-jadwal.php: get tbl_jadwal"); // again run query with limit
	
} else {	

	$sql = "SELECT kd_jadwal, thn_akademik, nama_dosen, kd_jurusan, kd_mk, hari, ruang, smt, kelas, jam_mulai, jam_selesai";
	$sql.=" FROM tbl_jadwal";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-jadwal.php: get tbl_jadwal");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kd_jadwal"];
    $nestedData[] = $row["thn_akademik"];
	$nestedData[] = $row["nama_dosen"];
	$nestedData[] = $row["kd_jurusan"];
    $nestedData[] = $row["kd_mk"];
    $nestedData[] = $row["hari"];
    $nestedData[] = $row["ruang"];
    $nestedData[] = $row["smt"];
    $nestedData[] = $row["kelas"];
    $nestedData[] = $row["jam_mulai"];
    $nestedData[] = $row["jam_selesai"];
    $nestedData[] = '<td><center>
                     <a href="edit-jadwal.php?kd='.$row['kd_jadwal'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="hapus-jadwal.php?kd='.$row['kd_jadwal'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['kd_jadwal'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
				    
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
