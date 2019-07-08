<?php 
$id = $_POST['id_user'];
$old_pass = $_POST['old_pass'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];
$submit = $_POST['submit'];

if ($submit) {
	$check = $koneksi->query("SELECT * FROM `user` WHERE `id`='$id' AND `password`='".MD5($old_pass)."'");
	$row = mysqli_num_rows($check);
	if ($row == "1") {
		if ($pass1 == $pass2) {
			$sql = $koneksi->query("UPDATE `user` SET `password`='".MD5($pass1)."' WHERE `id`='$id'");
			if ($sql) {
				?>
				<script type="text/javascript">
					alert("Password berhasil diubah!");
				</script>
				<?php
				session_destroy();
				?>
				<script type="text/javascript">
					window.location.href="login.php";
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert("Password gagal diubah!");
					window.location.href="?page=changepassword";
				</script>
				<?php
			}
		}else{
			?>
			<script type="text/javascript">
				alert("Password baru yang anda masukan tidak sama!");
				window.location.href="?page=changepassword";
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
			alert("Password yang anda masukan salah!");
			window.location.href="?page=changepassword";
		</script>
		<?php
	}
}
?>