<?php
$id = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$submit = $_POST['submit'];

if ($submit) {
	$check = $koneksi->query("SELECT * FROM `user` WHERE `id`='$id' AND `password`='".MD5($password)."'");
	$row = mysqli_num_rows($check);
	if ($row == "1") {
		$sql = $koneksi->query("UPDATE `user` SET `nama`='$nama',`username`='$username' WHERE `id`='$id'");
		if ($sql) {
			?>
			<script type="text/javascript">
				alert("Data berhasil diedit");
				<?php
				session_destroy();
				?>
				window.location.href = "login.php"
			</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Data gagal diedit");
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Password yang anda masukan salah");
			window.location.href = "?page=setting";
		</script>
		<?php
	}
}

?>