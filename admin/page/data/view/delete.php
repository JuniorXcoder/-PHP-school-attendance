<?php

$id = $_GET['id'];
$sql1 = $koneksi->query("SELECT * FROM `siswa` where id = '$id'");
$kelas = $sql1->fetch_assoc();
    ?>
    <script type="text/javascript">
    	alert("Data Berhasil Di Hapus");
window.location.href="index.php?page=viewsiswa&action=view&kelas=<?php echo $kelas['kelas']?>";
</script>
<?php
$koneksi->query("DELETE FROM `siswa` where id = '$id'");
?>