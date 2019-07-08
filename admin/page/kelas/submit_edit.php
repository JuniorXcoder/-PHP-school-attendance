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
$kelas = $_POST['kelas'];
$wali = $_POST['wali'];
$id = $_POST['id'];
$simpan = $_POST['simpan'];
//MySqli Insert Query
//MySqli Update Query
if($simpan){
$results = $mysqli->query("UPDATE `Kelas` SET `kelas` = '$kelas', `wali` = '$wali' WHERE `Kelas`.`id` = $id");

//MySqli Delete Query
//$results = $mysqli->query("DELETE FROM products WHERE ID=24");

if($results){
    print 'Success! record updated';
    header("location: ../../index.php?page=viewkelas");
}else{
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
}
}
?>