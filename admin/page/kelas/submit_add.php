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

$simpan = $_POST['simpan'];
//MySqli Insert Query
if($simpan){
$insert_row = $mysqli->query("INSERT INTO `kelas`(`kelas`, `wali`) VALUES('$kelas', '$wali')");

if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
    header("location: ../../index.php?page=inputkelas&action=inputsekretaris&kelas=$kelas");
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}}
?>

