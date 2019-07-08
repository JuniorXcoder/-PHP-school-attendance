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
$nama = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['password'];
$kelas = $_POST['kelas'];
$simpan = $_POST['simpan'];
$query = $mysqli->query("SELECT * FROM `kelas` WHERE `id`='$kelas'");
while ($data = $query->fetch_assoc()) {
	$idk = $data['kelas'];
}
//MySqli Insert Query
if($simpan){
$insert_row = $mysqli->query("INSERT INTO `user`(`nama`, `username`, `password`, `level`, `kelas`) VALUES ('$nama','$username', MD5('".$pass."'), 'Siswa','$kelas')");

if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
    header("location: ../../index.php?page=viewkelas");
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}}
?>

