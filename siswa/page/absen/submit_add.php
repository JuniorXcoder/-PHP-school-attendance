<?php
$servername = "localhost";
$username = "id8349832_db_test";
$password = "admin";
$dbname = "id8349832_db_test";
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
$kelas = $_POST['kelas'];
if ($simpan) {
	$sql1 = $mysqli->query("SELECT * FROM `siswa` WHERE `nisn`='$nisn' AND `kelas`='$kelas'");
	$row1 = mysqli_num_rows($sql1);
	$data = $sql1->fetch_assoc();

	if ($row1=="1") {
		$sql2 = $mysqli->query("SELECT * FROM `absensi` WHERE `nisn`='$nisn' AND `tanggal`='$tanggal'");
		$row2 = mysqli_num_rows($sql2);
		if ($row2=="1") {
			?>
			<script type="text/javascript">
				alert("Siswa Telah Absensi Sebelumnya");
				window.location.href= "?page=inputabsensi";
			</script>
			<?php
		}elseif ($row2=="0") {
			$sql3 = $mysqli->query("INSERT INTO `absensi` (`nisn`, `nama`, `kelas`, `bulan`, `tanggal`, `status`) VALUES ('$nisn','".$data['nama']."','".$data['kelas']."','$bulan','$tanggal','Hadir')");
			?>
			<script type="text/javascript">
				alert("Siswa Berhasil Melakukan Absensi");
				window.location.href= "?page=viewabsensi";
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Nisn Tidak Terdaftar");
			window.location.href= "?page=inputabsensi";
		</script>
		<?php
	}
}
?>

