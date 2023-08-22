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
	0 => 'kode_ksk',
    1 => 'tahun_ajar', 
	2 => 'nama_ksk',
	3 => 'kelas',
    4 => 'level_ksk'
);

// getting total number records without any search
$sql = "SELECT kode_ksk, tahun_ajar, nama_ksk, kelas, level_ksk";
$sql.=" FROM kelas";
$query=mysqli_query($conn, $sql) or die("ajax-data-kelas.php: get Kelas");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_ksk, tahun_ajar, nama_ksk, kelas, level_ksk";
	$sql.=" FROM kelas";
	$sql.=" WHERE kode_ksk LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR tahun_ajar LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_ksk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR kelas LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR level_ksk LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-data.php: get Kelas");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-kelas.php: get Kelas"); // again run query with limit
	
} else {	

	$sql = "SELECT kode_ksk, tahun_ajar, nama_ksk, kelas, level_ksk";
	$sql.=" FROM kelas";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajax-data-kelas.php: get Kelas");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_ksk"];
    $nestedData[] = $row["tahun_ajar"];
	$nestedData[] = $row["nama_ksk"];
	$nestedData[] = $row["kelas"];
    $nestedData[] = $row["level_ksk"];
    $nestedData[] = '<td><center>
                     <a href="edit-kelas.php?kd='.$row['kode_ksk'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="hapus-kelas.php?kd='.$row['kode_ksk'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama_ksk'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
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
