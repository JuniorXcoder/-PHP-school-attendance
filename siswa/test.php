<?php
$koneksi = mysqli_connect("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
$query = $koneksi->query("SELECT * FROM `absensi` WHERE `nisn`='0010668059' AND `tanggal`='12/12/2017'
");
$row = mysqli_num_rows($query);

echo $row;
?>