<?php

$id = $_GET['id'];
$koneksi->query("DELETE FROM `kelas` where id = '$id'");
    ?>
    <script type="text/javascript">
    	alert("Data Telah Di Hapus");
    	window.location.href="?page=viewkelas";
    </script>