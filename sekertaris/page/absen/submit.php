<?php
$nama = $_POST['nama'];
$simpan = $_POST['simpan'];
$tanggal = date("d/m/Y");
$bulan = date("m");
$ket = $_POST['keterangan'];
if ($simpan) {
	$sql1 = $koneksi->query("SELECT * FROM `siswa` WHERE `nama`='$nama' AND `kelas`='$kelas'");
	$row1 = mysqli_num_rows($sql1);
	$data = $sql1->fetch_assoc();

		$sql2 = $koneksi->query("SELECT * FROM `absensi` WHERE `nama`='$nama' AND `tanggal`='$tanggal'");
		$row2 = mysqli_num_rows($sql2);
		if ($row2=="1") {
			$sql4 = $koneksi->query("UPDATE `absensi` SET `status`='$ket' WHERE `nama`='$nama' AND `tanggal`='$tanggal'")
			?>
			<script type="text/javascript">
				alert("Keterangan Siswa Berhasil Di Edit");
				window.location.href= "?page=viewabsensi";
			</script>
			<?php
		}else{
			$sql3 = $koneksi->query("INSERT INTO `absensi` (`nisn`, `nama`, `kelas`, `bulan`, `tanggal`, `status`) VALUES ('".$data['nisn']."','$nama','$kelas','$bulan','$tanggal','$ket')");
			?>
			<script type="text/javascript">
				alert("Siswa Berhasil Melakukan Absensi");
				window.location.href= "?page=viewabsensi";
			</script>
			<?php
		}
}
?>

