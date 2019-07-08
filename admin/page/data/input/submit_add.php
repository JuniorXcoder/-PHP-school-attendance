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
$Nisn = $_POST['nisn'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$tl = $_POST['date'];
$tempat = $_POST['tempat'];
$nope = $_POST['nope'];
$ayah = $_POST['ayah'];
$ibu = $_POST['ibu'];
$kelas = $_POST['kelas'];

$simpan = $_POST['simpan'];
//MySqli Insert Query
if($simpan){
$sqlCommand1 = "SELECT * FROM `siswa` WHERE `nisn`='$Nisn'"; 
$query1 = mysqli_query($mysqli, $sqlCommand1) or die (mysqli_error($mysqli)); 
$row1 = mysqli_num_rows($query1);
	if ($row1 == 0) {
		$query2 = $mysqli->query("SELECT `id` FROM `kelas` WHERE `kelas`='$kelas'");
		while ($id_k = $query2->fetch_assoc()) {
			$kelas2 = $id_k['id'];
				$mysqli->query("INSERT INTO `siswa`(`nisn`, `nama`, `gender`, `tl`, `tempat`, `nope`, `ayah`, `ibu`, `kelas`) VALUES('$Nisn', '$nama', '$gender', '$tl', '$tempat', '$nope', '$ayah', '$ibu', '$kelas2')");
		}
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
    header("location: ../../../index.php?page=viewsiswa&action=view&kelas=$kelas2");
}else{
?><script type="text/javascript">
	alert("Nisn Telah Terdaftar Di Database");
	window.location.href ="../../../index.php?page=inputsiswa";
</script><?php
}}
?>