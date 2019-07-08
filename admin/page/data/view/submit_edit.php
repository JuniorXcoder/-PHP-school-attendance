<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$mysqli =  mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//values to be inserted in database table
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$id = $_POST['id'];
$tempat = $_POST['tempat'];
$tl = $_POST['date'];
$nope = $_POST['nope'];
$ayah = $_POST['ayah'];
$ibu = $_POST['ibu'];
$kelas = $_POST['kelas'];
$simpan = $_POST['simpan'];
//MySqli Insert Query
//MySqli Update Query
if($simpan){
		$query2 = $mysqli->query("SELECT `id` FROM `kelas` WHERE `kelas`='$kelas'");
		while ($id_k = $query2->fetch_assoc()) {
			$kelas2 = $id_k['id'];
			$results = $mysqli->query("UPDATE `siswa` SET `nisn` = '$nisn', `nama` = '$nama', `gender` = '$gender', `tl` = '$tl', `tempat` = '$tempat', `nope` = '$nope', `gender` = '$gender', `ayah` = '$ayah', `ibu` = '$ibu', `kelas` = '$kelas2' WHERE `siswa`.`id` = $id");
}
//MySqli Delete Query
//$results = $mysqli->query("DELETE FROM products WHERE ID=24");

if($results){
    print 'Success! record updated';
    header("location: ../../../index.php?page=viewsiswa&action=view&kelas=$kelas2");
}else{
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
}
}
?>