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
$simpan = $_POST['simpan'];
$tanggal = date("d/m/Y");
$bulan = date("m");
if($simpan){	
$insert_row = $mysqli->query("SELECT * FROM `siswa` WHERE `nisn`='$nisn'");
$row=mysqli_fetch_assoc($insert_row);
$nisn2 = $row['nisn'];
$nama = $row['nama'];
$kelas = $row['kelas'];
$sqlCommand1 = "SELECT * FROM `absensi` WHERE `nisn`='$nisn2' AND `tanggal`='$tanggal'"; 
$query1 = mysqli_query($mysqli, $sqlCommand1) or die (mysqli_error($mysqli)); 
$row1 = mysqli_num_rows($query1);
if($insert_row){
	if (!empty($row['nisn'])&&!empty($row['nama'])&&!empty($row['kelas'])) {
		if ($row1 == 0) {
		$insert = $mysqli->query("INSERT INTO `absensi`(`nisn`, `nama`, `kelas`, `bulan`, `tanggal`, `status`) VALUES ('$nisn2','$nama','$kelas','$bulan','$tanggal','Hadir');"); ?>
	<script type="text/javascript">
		alert("Siswa Telah Melakukan Absensi");
		window.location.href="../../index.php?page=absensi";
	</script> 
<?php
		}else{
    ?>
<script type="text/javascript">
	alert("Siswa Telah Absen Sebelum Nya");
	window.location.href="../../index.php?page=absensi&action=absen";
</script>
<?php
}}}}
?>

